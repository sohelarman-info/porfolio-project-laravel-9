<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use File;
use Image;
use Str;

class PaymentController extends Controller
{
    function PaymentMethodAdd(Request $request){
        $payment            = new PaymentMethod();
        $payment->name      = $request->name;
        $payment->account   = $request->account;
        $payment->slug      = Str::slug($request->name);
        if($request->hasFile('image')){
            $create_path    = public_path('gallery/images/portfolio/payment/');
            $image          = $request->file('image');
            File::makeDirectory($create_path, $mode = 0777, true, true);
            $extension      = Str::random(10).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1280, 820)->save($create_path.$extension);
            $payment->image   = $extension;
        }
        $payment->save();
        return back()->with('PaymentAdd', 'Payment Method Added');
    }
    function PaymentMethodEdit($id){
        return view('admin.portfolio.contact.payment-method-update',[
            'payment' => PaymentMethod::findOrFail($id),
        ]);
    }
    function PaymentMethodUpdate(Request $request){
        $update = PaymentMethod::findOrFail($request->id);
        $image_location = public_path('gallery/images/portfolio/payment/'.$update->image);
        if(file_exists($image_location)){
            unlink($image_location);
        }
        if($request->hasFile('image')){
            $create_path    = public_path('gallery/images/portfolio/payment/');
            $image          = $request->file('image');
            File::makeDirectory($create_path, $mode = 0777, true, true);
            $extension      = Str::random(10).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1280, 820)->save($create_path.$extension);
            $update->image   = $extension;
        }
        $update->name      = $request->name;
        $update->account   = $request->account;
        $update->slug      = Str::slug($request->name);
        $update->save();
        return redirect()->route('ContactSection')->with('PaymentAdd', 'Payment Method Updated');

    }
    function PaymentMethodDelete($id){
        $delete = PaymentMethod::findOrFail($id);
        $image_location = public_path('gallery/images/portfolio/payment/'.$delete->image);
        if(file_exists($image_location)){
            unlink($image_location);
        }
        $delete->delete();
        return back()->with('PaymentDelete', 'Payment Method Deleted');
    }
}
