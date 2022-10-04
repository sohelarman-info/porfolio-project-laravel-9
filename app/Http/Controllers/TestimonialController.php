<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use Image;

class TestimonialController extends Controller
{
    function Testimonials(){
        return view('admin.portfolio.testimonial.testimonial',[
            'testimonials' => Testimonial::orderBy('id', 'DESC')->paginate(9),
        ]);
    }
    function TestimonialAdd(){
        return view('admin.portfolio.testimonial.testimonial-add');
    }
    function Testimonialstore(Request $request){
        if($request->hasFile('image')){
            $create_path    = public_path('gallery/images/portfolio/testimonials/images/');
            File::makeDirectory($create_path, $mode = 0777, true, true);
            $image          = $request->file('image');
            $extension      = Str::random(10).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500, 500)->save($create_path . $extension);
            $store = new Testimonial();
            $store->name    = $request->name;
            $store->title   = $request->title;
            $store->star    = $request->star;
            $store->image   = $extension;
            $store->text    = $request->text;
            $store->save();
        }
        return redirect()->route('Testimonials')->with('Add', 'Testimonials Added');
    }
    function TestimonialDelete($id){
        $delete = Testimonial::findOrFail($id);
        $image_location = public_path('gallery/images/portfolio/testimonials/images/'.$delete->image);
        if(file_exists($image_location)){
            unlink($image_location);
        }
        $delete->delete();
        return back()->with('Delete', 'Testimonials Deleted');
    }
    function TestimonialEdit($id){
        return view('admin.portfolio.testimonial.testimonial-edit',[
            'testimonial'   => Testimonial::findOrFail($id),
        ]);
    }
    function TestimonialUpdate(Request $request){
        $update = Testimonial::findOrFail($request->id);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_location = public_path('gallery/images/portfolio/testimonials/images/');
            $extension = Str::slug($request->name).'.'.$image->getClientOriginalExtension();
            $delete = public_path('gallery/images/portfolio/testimonials/images/'.$update->image);
            if(file_exists($delete)){
                unlink($delete);
            }
            Image::make($image)->resize(500, 500)->save($image_location . $extension);
            $update->image   = $extension;
        }
        $update->name    = $request->name;
        $update->title   = $request->title;
        $update->star    = $request->star;
        $update->text    = $request->text;
        $update->save();
        return redirect()->route('Testimonials')->with('Add', $request->name.'Testimonials Uppdated');
    }
}
