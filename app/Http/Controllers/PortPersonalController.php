<?php

namespace App\Http\Controllers;
use App\Models\PersonalArea;
use App\Models\Social;
use App\Models\Vision;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use Image;

class PortPersonalController extends Controller
{
    function PersonalArea(){
        return view('admin.portfolio.personal.personal',[
            'personals' => PersonalArea::all(),
            'socials'   => Social::all(),
            'visions'   => Vision::all(),
        ]);
    }

    function PersonalAreaAdd(Request $request){
        if($request->hasFile('image')){
            $new_location = public_path('gallery/images/portfolio/banner/');
            File::makeDirectory($new_location , $mode = 0777, true, true);
            $image = $request->file('image');
            $extension = Str::slug($request->name).'.'.$image->getClientOriginalExtension();
            Image::make($image)->save($new_location . $extension);
            $personal = new PersonalArea();
            $personal->image        = $extension;
        }
        $personal->name             = $request->name;
        $personal->title            = $request->title;
        $personal->hire_btn         = $request->hire_btn;
        $personal->hire_link        = $request->hire_link;
        $personal->hire_icon        = $request->hire_icon;
        $personal->project_btn      = $request->project_btn;
        $personal->project_link     = $request->project_link;
        $personal->project_icon     = $request->project_icon;
        $personal->designation_1    = $request->designation_1;
        $personal->designation_2    = $request->designation_2;
        $personal->designation_3    = $request->designation_3;
        $personal->designation_4    = $request->designation_4;
        $personal->designation_5    = $request->designation_5;
        $personal->save();
        return back()->with('PersonalAdd', 'Personal Information Added');
    }

    function PersonalAreaUpdate(Request $request){
        $personal = PersonalArea::findOrFail($request->id);
        if($request->hasFile('image')){
            $image           = $request->file('image');
            $new_location = public_path('gallery/images/portfolio/banner/');
            $extension = Str::slug($request->name).'.'.$image->getClientOriginalExtension();
            $delete = public_path('gallery/images/portfolio/banner/'.$personal->image);
            if(file_exists($delete)){
                unlink($delete);
            }
            Image::make($image)->save($new_location . $extension);
            $personal->image        = $extension;
        }
        $personal->name             = $request->name;
        $personal->title            = $request->title;
        $personal->hire_btn         = $request->hire_btn;
        $personal->hire_link        = $request->hire_link;
        $personal->hire_icon        = $request->hire_icon;
        $personal->project_btn      = $request->project_btn;
        $personal->project_link     = $request->project_link;
        $personal->project_icon     = $request->project_icon;
        $personal->designation_1    = $request->designation_1;
        $personal->designation_2    = $request->designation_2;
        $personal->designation_3    = $request->designation_3;
        $personal->designation_4    = $request->designation_4;
        $personal->designation_5    = $request->designation_5;
        $personal->save();
        return back()->with('PersonalAdd', 'Personal Information Updated');
    }

    function SocialAdd(Request $request){
        $social = new Social();
        $social->name = $request->name;
        $social->link = $request->link;
        $social->icon = $request->icon;
        $social->slug = Str::slug($request->name);
        $social->save();
        return back()->with('SocialAdd', 'Social Media Added!');
    }
    function SocialEdit($id){
        return view('admin.portfolio.social.social-edit',[
            'social' => Social::findOrFail($id),
        ]);
    }
    function SocialDelete($id){
        $delete = Social::findOrFail($id);
        $delete->delete();
        return back()->with('SocialDelete', 'Social Item Deleted');
    }
    function SocialUpdate(Request $request){
        $social = Social::findOrFail($request->id);
        $social->name = $request->name;
        $social->link = $request->link;
        $social->icon = $request->icon;
        $social->slug = Str::slug($request->name);
        $social->save();
        return redirect()->route('PersonalArea')->with('SocialAdd', 'Social Media Updated!');
    }
}
