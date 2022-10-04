<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;
use File;
use Image;
use Symfony\Component\Console\Input\Input;

// php artisan make:model Blog -mcr
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    // Custom Function Area Start


    function BlogSection(){
        return view('admin.portfolio.blog.blog',[
            'blogsections'      => BlogSection::all(),
            'blogcategories'    => BlogCategory::orderBy('id', 'DESC')->paginate(10),
            'blogs'             => Blog::orderBy('id', 'DESC')->paginate(10),
        ]);
    }
    function BlogSectionAdd(Request $request){
        $blog_section = new BlogSection();
        $blog_section->name = $request->name;
        $blog_section->text = $request->text;
        $blog_section->save();
        return back()->with('CategoryAdd', 'Blog Section Added');
    }
    function BlogSectionEdit($id){
        return view('admin.portfolio.blog.blog-section-edit',[
            'blogsection' => BlogSection::findOrFail($id),
        ]);
    }
    function BlogSectionUpdate(Request $request){
        $blog_section = BlogSection::findOrFail($request->id);
        $blog_section->name = $request->name;
        $blog_section->text = $request->text;
        $blog_section->save();
        return redirect()->route('BlogSection')->with('Add', 'Blog Section Updated');
    }
    function BlogCategoryAdd(Request $request){
        $request->validate([
            'name'  => ['required', 'unique:blog_categories,name', 'max:20'],
         ],[
             'name.required'             => '* Name field is required.',
             'name.unique'               => '* '.$request->name.' Already existed',
             'name.max'                  => '* Maximum value 20 Charecters',
         ]);
        $category = new BlogCategory();
        $category->user_id  = Auth::id();
        $category->name     = $request->name;
        $category->slug     = Str::slug($request->name);
        $category->save();
        return back()->with('CategoryAdd', 'Category Added');
    }
    function BlogCategoryEdit($id){
        return view('admin.portfolio.blog.blog-category-edit',[
            'blogcategory' => BlogCategory::findOrFail($id),
        ]);

    }
    function BlogCategoryUpdate(Request $request){
        $request->validate([
            'name'  => ['required', 'unique:blog_categories,name', 'max:20'],
         ],[
             'name.required'             => '* Name field is required.',
             'name.unique'               => '* '.$request->name.' Already existed',
             'name.max'                  => '* Maximum value 20 Charecters',
         ]);
        $category = BlogCategory::findOrFail($request->id);
        $category->user_id  = Auth::id();
        $category->name     = $request->name;
        $category->slug     = Str::slug($request->name);
        $category->save();
        return redirect()->route('BlogSection')->with('CategoryAdd', 'Category Added');

    }
    function BlogCategoryDelete($id){
        $blog = Blog::where('category_id', $id)->count();
        if($blog > 0){
        return back()->with('CategoryDelete', 'Somoething was wrong - 1st delete your blog post');
        }
        else{
            $category= BlogCategory::find($id);
            $category->delete();
        return back()->with('CategoryDelete', 'Category Deleted');
        }
    }
    function BlogInCategory($slug){
        $category = BlogCategory::where('slug', $slug)->first();
        return view('admin.portfolio.blog.category-wise-blog',[
            'blogs'             => Blog::where('category_id', $category->id)->paginate(10),
            'blogcategories'    => BlogCategory::orderBy('id', 'DESC')->paginate(10),
        ]);
    }

    //Custom Function Area End

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portfolio.blog.blog-create',[
            'categories' => BlogCategory::orderBy('id', 'DESC')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'         => ['required', 'unique:blogs,title', 'max:50'],
            'category_id'   => ['required'],
            'thumbnail'     => ['required'],
         ],[
             'name.required'             => '* Name field is required.',
             'name.unique'               => '* '.$request->title.' Already existed',
             'name.max'                  => '* Maximum value 50 Charecters',
             'category_id.required'      => '* Category Must be selected.',
             'thumbnail.required'        => '* Thumbnail Must be Uploaded.',
         ]);

        $store              = new Blog();
        $store->user_id     = Auth::id();
        $store->category_id = $request->category_id;
        $store->title       = $request->title;
        $store->slug        = Str::slug($request->title);
        $store->post        = $request->post;
        $store->description = $request->description;
        $store->save();
        if($request->hasFile('thumbnail')){
            $create_location = public_path('gallery/images/portfolio/blog/'.$store->created_at->format('Y').'/'.$store->created_at->format('m').'/'.$store->created_at->format('d').'/'.$store->id.'/');
            $thumbnail = $request->file('thumbnail');
            File::makeDirectory($create_location, $mode = 0777, true, true);
            $extension = $store->slug.'.'.$thumbnail->getClientOriginalExtension();
            Image::make($thumbnail)->resize(1280, 720)->save($create_location.$extension);
            $update = Blog::findOrFail($store->id);
            $update->thumbnail = $extension;
            $update->save();
        }
        return redirect()->route('BlogSection')->with('BlogAdd', $store->title.' Blog Added Successfully Done!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('admin.portfolio.blog.blog-view',[
            'blog' => $blog,
            'categories' => BlogCategory::orderBy('id', 'DESC')->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('admin.portfolio.blog.blog-update',[
            'categories'    => BlogCategory::orderBy('id', 'DESC')->get(),
            'blog'          => Blog::findOrFail($blog->id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title'         => ['required','max:50'],
            'category_id'   => ['required'],
         ],[
             'name.required'             => '* Name field is required.',
             'name.max'                  => '* Maximum value 50 Charecters',
             'category_id.required'      => '* Category Must be selected.',
         ]);

        $store = $blog;
        $store->user_id     = Auth::id();
        $store->category_id = $request->category_id;
        $store->title       = $request->title;
        $store->slug        = Str::slug($request->title);
        $store->post        = $request->post;
        $store->description = $request->description;

        if($request->hasFile('thumbnail')){
            $thumbnail_location = public_path('gallery/images/portfolio/blog/').$store->created_at->format('Y').'/'.$store->created_at->format('m').'/'.$store->created_at->format('d').'/'.$store->id.'/'.$store->thumbnail;
            if(file_exists($thumbnail_location)){
                unlink($thumbnail_location);
            }
            $new_location = public_path('gallery/images/portfolio/blog/'.$store->created_at->format('Y').'/'.$store->created_at->format('m').'/'.$store->created_at->format('d').'/'.$store->id.'/');
            File::makeDirectory($new_location, $mode = 0777, true, true);
            $thumbnail = $request->file('thumbnail');
            $extension = Str::slug($request->title).'.'.$thumbnail->getClientOriginalExtension();
            Image::make($thumbnail)->resize(1280, 720)->save($new_location. $extension);
            $store->thumbnail = $extension;
        }

        if($request->hasFile('thumbnail')){
            $create_location = public_path('gallery/images/portfolio/blog/'.$store->created_at->format('Y').'/'.$store->created_at->format('m').'/'.$store->created_at->format('d').'/'.$store->id.'/');
            $thumbnail = $request->file('thumbnail');
            File::makeDirectory($create_location, $mode = 0777, true, true);
            $extension = $store->slug.'.'.$thumbnail->getClientOriginalExtension();
            Image::make($thumbnail)->resize(1280, 720)->save($create_location.$extension);
            $update = Blog::findOrFail($store->id);
            $update->thumbnail = $extension;
            $update->save();
        }
        $store->save();
        return redirect()->route('BlogSection')->with('BlogAdd', $store->title.' Blog Updated Successfully Done!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $id
     * @return \Illuminate\Http\Response
     */
    function SoftDelete(Blog $id){
        $id->delete();
        return back()->with('BlogDelete', 'Move to Trush');
    }
    function TrushFolder(){
        return view('admin.portfolio.blog.trush-folder',[
            'blogcategories'    => BlogCategory::orderBy('id', 'DESC')->paginate(10),
            'blogs'             => Blog::orderBy('id', 'DESC')->paginate(10),
            'trushed'           => Blog::onlyTrashed()->paginate(10),
        ]);
    }
    function BlogRestore($id){
        $restore = Blog::withTrashed()->find($id);
        $restore->restore();
        return back()->with('Add', 'Blog Restored');
    }
    public function BlogDestroy($id)
    {
        $blog = Blog::withTrashed()->findOrFail($id);
        $delete_directory   = public_path("gallery/images/portfolio/blog/".$blog->created_at->format('Y').'/'.$blog->created_at->format('m').'/'.$blog->created_at->format('d').'/'.$blog->id);
        File::deleteDirectory($delete_directory);
        $blog->forceDelete();
        return back()->with('Delete', 'Blog Permanent Deleted');
    }
}
