<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Study;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    function Education(){
        return view('admin.portfolio.education.education',[
            'educations'    => Education::all(),
            'studies'       => Study::orderBy('id', 'DESC')->get(),
        ]);
    }
    function EducationSectionAdd(Request $request){
        $education = new Education();
        $education->name = $request->name;
        $education->text = $request->text;
        $education->save();
        return back()->with('EducationAdd','Education Added');
    }
    function EducationSectionEdit($id){
        return view('admin.portfolio.education.education-section-edit',[
            'education' => Education::findOrFail($id),
        ]);
    }
    function EducationSectionUpdate(Request $request){
        $education = Education::findOrFail($request->id);
        $education->name = $request->name;
        $education->text = $request->text;
        $education->save();
        return redirect()->route('Education')->with('EducationAdd','Education Updated');
    }
    function StudyAdd(Request $request){
        $study = new Study();
        $study->title   = $request->title;
        $study->name    = $request->name;
        $study->start   = $request->start;
        $study->end     = $request->end;
        $study->text    = $request->text;
        $study->save();
        return back()->with('EducationAdd', $request->name.' Added');
    }
    function StudyEdit($id){
        return view('admin.portfolio.education.study-edit',[
            'study' => Study::findOrFail($id),
        ]);
    }
    function StudyUpdate(Request $request){
        $study = Study::findOrFail($request->id);
        $study->title   = $request->title;
        $study->name    = $request->name;
        $study->start   = $request->start;
        $study->end     = $request->end;
        $study->text    = $request->text;
        $study->save();
        return redirect()->route('Education')->with('EducationAdd','Study item Updated');
    }
    function StudyDelete($id){
        $study = Study::findOrFail($id);
        $study->delete();
        return back()->with('Delete', 'Item Deleted');
    }
}
