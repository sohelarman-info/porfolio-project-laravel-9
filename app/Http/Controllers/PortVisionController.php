<?php

namespace App\Http\Controllers;

use App\Models\Vision;
use Illuminate\Http\Request;

class PortVisionController extends Controller
{
    function VisionAdd(Request $request){
        $vision = new Vision();
        $vision->name = $request->name;
        $vision->text = $request->text;
        $vision->save();
        return back()->with('VisionAdd', $request->name.' Added');
    }
    function VisionUpdate(Request $request){
        $vision = Vision::findOrFail($request->id);
        $vision->name = $request->name;
        $vision->text = $request->text;
        $vision->save();
        return back()->with('VisionAdd', $request->name.' Updated');
    }
}
