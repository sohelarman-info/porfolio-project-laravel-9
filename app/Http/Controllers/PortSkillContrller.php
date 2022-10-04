<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\WhyMe;
use Illuminate\Http\Request;

class PortSkillContrller extends Controller
{
    function SkillSection(){
        return view('admin.portfolio.skill.skill',[
            'skills'    => Skill::all(),
            'whyme'     => WhyMe::all(),
        ]);
    }
    function SkillAdd(Request $request){

        $request->validate([
           'name'   => ['required'],
           'skill'  => ['required'],
           'percent'  => ['required', 'integer','min:1', 'max:100', 'digits_between:1,3'],
        ],[
            'name.required'             => '* Name field is required.',
            'skill.required'            => '* Skill field is required.',
            'percent.required'          => '* Percent field is required.',
            'percent.integer'           => '* Must be type Integer 1-100 Value.',
            'percent.min'               => '* Minimum type value 01.',
            'percent.digits_between'    => '* Digit Limit 1-3',
            'percent.max'               => '* Maximum type value 01',
        ]);

        $skill          = new Skill();
        $skill->name    = $request->name;
        $skill->skill   = $request->skill;
        $skill->percent = $request->percent;
        $skill->save();
        return back()->with('SkillAdd', $request->skill.' Skill Added');
    }
    function SkillUpdate(Request $request){
        $request->validate([
            'name'   => ['required'],
            'skill'  => ['required'],
            'percent'  => ['required', 'integer','min:1', 'max:100', 'digits_between:1,3'],
         ],[
             'name.required'             => '* Name field is required.',
             'skill.required'            => '* Skill field is required.',
             'percent.required'          => '* Percent field is required.',
             'percent.integer'           => '* Must be type Integer 1-100 Value.',
             'percent.min'               => '* Minimum type value 01.',
             'percent.digits_between'    => '* Digit Limit 1-3',
             'percent.max'               => '* Maximum type value 01',
         ]);

         $skill          = Skill::findOrFail($request->id);
         $skill->name    = $request->name;
         $skill->skill   = $request->skill;
         $skill->percent = $request->percent;
         $skill->save();
         return back()->with('SkillUpdate', $request->skill.' Skill Updated');
    }
    function SkillDelete($id){
        $delete = Skill::findOrFail($id);
        $delete->delete();
        return back()->with('SkillDelete', $delete->skill.' Skill Deleted');
    }
    function WhyMe(Request $request){
        $request->validate([
            'name'   => ['required'],
            'text'   => ['required'],
        ],[
            'name.required'             => '* Name field is required.',
            'text.required'             => '* Text field is required.',
        ]);
        $why = new WhyMe();
        $why->name = $request->name;
        $why->text = $request->text;
        $why->save();
        return back()->with('WhyMe', $why->name.' Added');
    }
    function WhyMeUpdate(Request $request){
        $request->validate([
            'name'   => ['required'],
            'text'   => ['required'],
        ],[
            'name.required'             => '* Name field is required.',
            'text.required'             => '* Text field is required.',
        ]);
        $why = WhyMe::findOrFail($request->id);
        $why->name = $request->name;
        $why->text = $request->text;
        $why->save();
        return back()->with('WhyMe', $why->name.' Updated');
    }
}
