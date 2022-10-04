<?php

namespace App\Http\Controllers;

use App\Models\MultipleImage;
use App\Models\PortfolioCategory;
use App\Models\PortfolioProject;
use App\Models\PortfolioSection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use File;
use Illuminate\Support\Facades\Auth;
use Image;

class Portfolio extends Controller
{
    function Portfolio(){
        return view('admin.portfolio.portfolio.portfolio',[
            'portfoliosection'  => PortfolioSection::all(),
            'portfoliocategory' => PortfolioCategory::all(),
            'portfolioproject'  => PortfolioProject::orderBy('id', 'DESC')->paginate(7),
        ]);
    }
    function PortfolioSectionAdd(Request $request){
        $portfolio = new PortfolioSection();
        $portfolio->name = $request->name;
        $portfolio->text = $request->text;
        $portfolio->save();
        return back()->with('PortfolioSectionAdd', $request->name.' Added');

    }
    function PortfolioSectionEdit($id){
        return view('admin.portfolio.portfolio.portfolio-section-edit',[
            'portfoliosection' => PortfolioSection::findOrFail($id),
        ]);
    }
    function PortfolioSectionUpdate(Request $request){
        $portfoliosection = PortfolioSection::findOrFail($request->id);
        $portfoliosection->name = $request->name;
        $portfoliosection->text = $request->text;
        $portfoliosection->save();
        return redirect()->route('Portfolio')->with('PortfolioSectionAdd', $request->name.' Added');
    }
    function PortCatAdd(Request $request){
        $request->validate([
            'name'  => ['required', 'unique:portfolio_categories,name'],
         ],[
             'name.required'             => '* Name field is required.',
             'name.unique'               => '* '.$request->name.' Already existed',
         ]);
        $portcategoy            = new PortfolioCategory();
        $portcategoy->portsecid = $request->portsecid;
        $portcategoy->name      = $request->name;
        $portcategoy->icon      = $request->icon;
        $portcategoy->slug      = Str::slug($request->name);
        $portcategoy->save();
        return back()->with('PortCatAdd', $request->name.' Added');
    }
    function PortCatDelete($id){
        $portcategoy = PortfolioCategory::findOrFail($id);
        $portcategoy->forceDelete();
        return back()->with('PortCatDelete','Category Deleted');
    }
    function PortCatEdit($id){
        return view('admin.portfolio.portfolio.portfolio-category-edit',[
            'portfoliocategory' => PortfolioCategory::findOrFail($id),
        ]);
    }
    function PortCategoryUpdate(Request $request){
        $portcategoy            = PortfolioCategory::findOrfail($request->id);
        $portcategoy->name      = $request->name;
        $portcategoy->icon      = $request->icon;
        $portcategoy->slug      = Str::slug($request->name);
        $portcategoy->save();
        return redirect()->route('Portfolio')->with('PortCatAdd', $request->name.' Updated');
    }
    function InCategory($slug){
        $category = PortfolioCategory::where('slug', $slug)->first();
        return view('admin.portfolio.portfolio.project',[
            'projects' => PortfolioProject::where('category', $category->id)->paginate(10),
            'projectcategory' => PortfolioCategory::orderBy('name', 'ASC')->get()
        ]);
    }
    function PortfolioAdd(){
        return view('admin.portfolio.portfolio.portfolio-add',[
            'portfoliocategory' => PortfolioCategory::all(),
        ]);
    }
    function PortfolioProjectAdd(Request $request){
        $request->validate([
            'name'      => ['required'],
            'category'  => ['required'],
        ]);
        $project            = new PortfolioProject();
        $project->auth_id   = Auth::id();
        $project->name      = $request->name;
        $project->company   = $request->company;
        $project->category  = $request->category;
        $project->client    = $request->client;
        $project->url       = $request->url;
        $project->text      = $request->text;
        $project->summary   = $request->summary;
        $project->slug	   = Str::slug($request->name);
        $project->save();
        if($request->hasFile('thumbnail')){
            $create_path = public_path('gallery/images/portfolio/project/').$project->created_at->format('Y/m/d/').$project->id.'/'.'thumbnail/';
            File::makeDirectory($create_path, $mode = 0777, true, true);
            $image = $request->file('thumbnail');
            $extension = Str::slug($request->name).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1500, 1000)->save($create_path . $extension);
            $project_thum = PortfolioProject::findOrFail($project->id);
            $project_thum->thumbnail = $extension;
            $project_thum->save();
        }
        if($request->hasFile('images')){
            $images = $request->file('images');
            $new_location = public_path('gallery/images/portfolio/project/').$project->created_at->format('Y/m/d/').$project->id.'/'.'images/';
            File::makeDirectory($new_location , $mode = 0777, true, true);
            foreach ($images as $img) {
                $img_ext   = Str::random(16).'.'. $img->getClientOriginalExtension();
                Image::make($img)->save($new_location . $img_ext);
                $multiImage = new MultipleImage();
                $multiImage->auth_id = Auth::id();
                $multiImage->project_id = $project->id;
                $multiImage->images = $img_ext;
                $multiImage->save();
            }
        }
        return redirect()->route('Portfolio')->with('PortfolioSectionAdd', $request->name.' Project Added');
    }
    function PortfolioProjectDelete($id){
        $project    = PortfolioProject::findOrFail($id);
        $delete_directory = public_path('gallery/images/portfolio/project/').$project->created_at->format('Y/m/d/').$project->id;
        $images     = MultipleImage::where('project_id', $project->id);
        File::deleteDirectory($delete_directory);
        $images->forceDelete();
        $project->forceDelete();
        return back()->with('ProjectDelete', $project->name.' Deleted');

    }
    function PortfolioProjectView($slug){
        return view('admin.portfolio.portfolio.portfolio-project-view',[
            'projectview' => PortfolioProject::where('slug', $slug)->first(),
            'projectcategory' => PortfolioCategory::orderBy('name', 'ASC')->get(),
        ]);
    }
    function PortfolioProjectEdit($slug){
        return view('admin.portfolio.portfolio.portfolio-edit',[
            'portfoliocategory' => PortfolioCategory::orderBy('name', 'ASC')->get(),
            'project'           => PortfolioProject::where('slug', $slug)->first(),
        ]);
    }
    function MultipleImageDelete($id){
        $delete = MultipleImage::findOrFail($id);
        $image_location = public_path('gallery/images/portfolio/project/').$delete->PortfolioProject->created_at->format('Y/m/d/').$delete->PortfolioProject->id.'/'.'images/'.$delete->images;
            if(file_exists($image_location)){
                unlink($image_location);
        }
        $delete->forceDelete();
        return back()->with('MultipleImageDelete', 'Image Deleted');
    }
    function PortfolioProjectUpdate(Request $request){
        $request->validate([
            'name'      => ['required'],
            'category'  => ['required'],
        ]);
        $project = PortfolioProject::findOrFail($request->id);
        if($request->hasFile('thumbnail')){
            $thumbnail_location = public_path('gallery/images/portfolio/project/').$project->created_at->format('Y/m/d/').$project->id.'/'.'thumbnail/'.$project->thumbnail;
            if(file_exists($thumbnail_location)){
                unlink($thumbnail_location);
            }
            $new_location = public_path('gallery/images/portfolio/project/').$project->created_at->format('Y/m/d/').$project->id.'/'.'thumbnail/';
            File::makeDirectory($new_location, $mode = 0777, true, true);
            $thumbnail = $request->file('thumbnail');
            $extension = Str::slug($request->name).'.'.$thumbnail->getClientOriginalExtension();
            Image::make($thumbnail)->resize(1500, 1000)->save($new_location. $extension);
            $project->thumbnail = $extension;
        }
        $project->auth_id   = Auth::id();
        $project->name      = $request->name;
        $project->company   = $request->company;
        $project->category  = $request->category;
        $project->client    = $request->client;
        $project->url       = $request->url;
        $project->text      = $request->text;
        $project->summary   = $request->summary;
        $project->slug	   = Str::slug($request->name);
        $project->save();

        if($request->hasFile('images')){
            $images = $request->file('images');
            $new_location = public_path('gallery/images/portfolio/project/').$project->created_at->format('Y/m/d/').$project->id.'/'.'images/';
            File::makeDirectory($new_location , $mode = 0777, true, true);
            foreach ($images as $img) {
                $img_ext   = Str::random(16).'.'. $img->getClientOriginalExtension();
                Image::make($img)->save($new_location . $img_ext);
                $multiImage = new MultipleImage();
                $multiImage->auth_id = Auth::id();
                $multiImage->project_id = $project->id;
                $multiImage->images = $img_ext;
                $multiImage->save();
            }
        }
        return redirect()->route('Portfolio')->with('PortfolioSectionAdd', $request->name.' Project Updated');
    }
}
