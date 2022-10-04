<?php

namespace App\Http\Controllers;

use App\Models\Ready;
use Illuminate\Http\Request;

class ReadyController extends Controller
{
    function Ready(){
        return view('admin.portfolio.ready.ready',[
            'readysection' => Ready::all(),
        ]);
    }
    function ReadyAdd(Request $request){
        $ready = new Ready();
        $ready->title = $request->title;
        $ready->icon = $request->icon;
        $ready->button = $request->button;
        $ready->text = $request->text;
        $ready->save();
        return back()->with('Add', 'Ready Section Added');
    }
    function ReadyUpdate(Request $request){
        $ready = Ready::findOrFail($request->id);
        $ready->title = $request->title;
        $ready->icon = $request->icon;
        $ready->button = $request->button;
        $ready->text = $request->text;
        $ready->save();
        return back()->with('Add', 'Ready Section Updated');
    }
}
