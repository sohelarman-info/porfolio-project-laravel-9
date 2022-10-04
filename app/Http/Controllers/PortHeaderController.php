<?php

namespace App\Http\Controllers;

use App\Models\PortHeader;
use App\Models\PortHeaderNav;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use Image;

class PortHeaderController extends Controller
{
    function PortHeader(){
        return view('admin.portfolio.header.header',[
            'headers'   => PortHeader::all(),
            'navs'      => PortHeaderNav::all(),
        ]);
    }
    function PortHeaderImage(Request $request){
        if($request->hasFile('logo')){
            $new_location       = public_path('gallery/images/portfolio/header/images/');
            File::makeDirectory($new_location , $mode = 0777, true, true);
            $image = $request->file('logo');
            $extension   = Str::slug($request->name).'.'. $image->getClientOriginalExtension();
            Image::make($image)->save($new_location . $extension);
            $header             = new PortHeader();
            $header->name       = $request->name;
            $header->title      = $request->title;
            $header->logo       = $extension;
            $header->slug       = Str::slug($request->name);
            $header->status     = $request->status;
            $header->save();
            return back()->with('HeaderUpdate', 'Header Updated!');
        }
    }
    function PortHeaderImageUpdate(Request $request){
        $update = PortHeader::findOrFail($request->id);
        if($request->hasFile('logo')){
            $logo           = $request->file('logo');
            $new_location   = public_path('gallery/images/portfolio/header/images/');
            $extension      = Str::slug($request->name).'.'. $logo->getClientOriginalExtension();
            $delete         = public_path('gallery/images/portfolio/header/images/'.$update->logo);
            if(file_exists($delete)){
                unlink($delete);
            }
            Image::make($logo)->save($new_location . $extension);
            $update->logo       = $extension;
        }
            $update->name       = $request->name;
            $update->title      = $request->title;
            $update->slug       = Str::slug($request->name);
            $update->status     = $request->status;
            $update->save();
        return back()->with('HeaderUpdate', 'Header Updated!');
    }
    function PortHeaderNav(Request $request){
        $nav = new PortHeaderNav();
        $nav->name = $request->name;
        $nav->link = $request->link;
        $nav->icon = $request->icon;
        $nav->slug = Str::slug($request->name);
        $nav->save();
        return back()->with('HeaderNavAdd', 'Header Navbar Added!');
    }
    function PortHeaderNavDelete($id){
        $nav_delete = PortHeaderNav::findOrFail($id);
        $nav_delete->delete();
        return back()->with('HeaderNavDelete', 'Header Navbar Added!');
    }
    function PortHeaderNavEdit($id){
        return view('admin.portfolio.header.header-nav-edit',[
            'nav' => PortHeaderNav::findOrFail($id)
        ]);
        return back()->with('HeaderNavDelete', 'Header Navbar Added!');
    }
    function PortHeaderNavUpdate(Request $request){
        $nav = PortHeaderNav::findOrFail($request->id);
        $nav->name = $request->name;
        $nav->link = $request->link;
        $nav->icon = $request->icon;
        $nav->slug = Str::slug($request->name);
        $nav->save();
        return redirect()->route('PortHeader')->with('HeaderNavAdd', 'Header Navbar Updated');
    }
}
