<?php

namespace App\Http\Controllers;

use App\Models\Coundown;
use Illuminate\Http\Request;

class CoundownController extends Controller
{
    function Coundown(){
        return view('admin.portfolio.coundown.coundown',[
            'coundowns' => Coundown::all(),
        ]);
    }
    function CoundownAdd(Request $request){
        $coundown = new Coundown();
        $coundown->icon = $request->icon;
        $coundown->name = $request->name;
        $coundown->text = $request->text;
        $coundown->save();
        return back()->with('CoundownAdd', $request->name.' Added');
    }
    function CoundownEdit($id){
        return view('admin.portfolio.coundown.coundown-edit',[
            'coundown' => Coundown::findOrFail($id),
        ]);
    }
    function CoundownUpdate(Request $request){
        $coundown = Coundown::findOrFail($request->id);
        $coundown->icon = $request->icon;
        $coundown->name = $request->name;
        $coundown->text = $request->text;
        $coundown->save();
        return redirect()->route('Coundown')->with('CoundownAdd', $request->name.' Updated');
    }
    function CoundownDelete($id){
        $coundown = Coundown::findOrFail($id);
        $coundown->delete();
        return back()->with('CoundownDelete', 'Item Added');
    }

}
