<?php

namespace App\Http\Controllers;

use App\Models\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SendMailController extends Controller
{
    function SendMailSection(){
        return view('admin.portfolio.mail.send-mail-section',[
            'mails' => SendMail::orderBy('id', 'DESC')->paginate(10),
        ]);
    }
    function SendMailview($id){
        $mail = SendMail::findOrFail($id);
        $mail->status = 2;
        $mail->save();
        return view('admin.portfolio.mail.send-mail-view',[
            'mail'  => $mail,
            'mails' => SendMail::orderBy('id', 'DESC')->paginate(10),
        ]);
    }
    function SendMailDelete($id){
        $mail = SendMail::findOrFail($id);
        $mail->delete();
        return back()->with('Delete', 'Email Deleted!');
    }
    public function SendMail(Request $request){
        $request->validate([
            'name'      => 'required|max:30',
            'email'     =>'required',
            'number'    => 'required|max:14',
            'text'      => 'required',
        ]);
        $mail           = new SendMail();
        $mail->name     = $request->name;
        $mail->number   = $request->number;
        $mail->email    = $request->email;
        $mail->text     = $request->text;
        if(Auth::id() == ''){
            $mail->user     = 'Guest';
        }else{
            $mail->user_id = Auth::id();
        }
        $mail->save();
        return back()->with('Send', 'Thank you, Your email successfully send!');
    }
}
