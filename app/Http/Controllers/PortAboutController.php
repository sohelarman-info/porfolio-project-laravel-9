<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use Image;

class PortAboutController extends Controller
{
    function About(){
        return view('admin.portfolio.about.about',[
            'abouts' => About::all(),
        ]);
    }
    function AboutAdd(Request $request){
        $about = new About();
        if($request->hasFile('image')){
            $create_path = public_path('gallery/images/portfolio/about/images/');
            File::makeDirectory($create_path, $mode = 0777, true, true);
            $image = $request->file('image');
            $extension = Str::slug($request->name).'.'.$image->getClientOriginalExtension();
            Image::make($image)->save($create_path . $extension);
            $about->image = $extension;
        }
        $about->name = $request->name;
        $about->text = $request->text;
        $about->save();
        return back()->with('AboutAdd', 'About Item Added');
    }
    function AboutUpdate(Request $request){
        $about = About::findOrFail($request->id);
        if($request->hasFile('image')){
            $image           = $request->file('image');
            $new_location = public_path('gallery/images/portfolio/about/images/');
            $extension = Str::slug($request->name).'.'.$image->getClientOriginalExtension();
            $delete = public_path('gallery/images/portfolio/about/images/'.$about->image);
            if(file_exists($delete)){
                unlink($delete);
            }
            Image::make($image)->save($new_location . $extension);
            $about->image        = $extension;
        }
        $about->name             = $request->name;
        $about->text             = $request->text;
        $about->save();
        return back()->with('AboutAdd', 'About Item Updated');
    }
}
