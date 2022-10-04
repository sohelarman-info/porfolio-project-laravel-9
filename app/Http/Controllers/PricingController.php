<?php

namespace App\Http\Controllers;

use App\Models\Pricing;
use App\Models\PricingSection;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    function PricingSectionAdd(Request $request){
        $pricing = new PricingSection();
        $pricing->name = $request->name;
        $pricing->text = $request->text;
        $pricing->save();
        return back()->with('Add', 'Pricing Added');
    }
    function PricingSectionEdit($id){
        return view('admin.portfolio.service.pricing-section-edit',[
            'pricing' => PricingSection::findOrFail($id),
        ]);
    }
    function PricingSectionUpdate(Request $request){
        $pricing = PricingSection::findOrFail($request->id);
        $pricing->name = $request->name;
        $pricing->text = $request->text;
        $pricing->save();
        return redirect()->route('ServiceSection')->with('Add', 'Pricing Updated');
    }
    function PricingAdd(Request $request){
        $pricing = new Pricing();
        $pricing->name      = $request->name;
        $pricing->sign      = $request->sign;
        $pricing->price     = $request->price;
        $pricing->duration  = $request->duration;
        $pricing->icon      = $request->icon;
        $pricing->link      = $request->link;
        $pricing->button    = $request->button;
        $pricing->text      = $request->text;
        $pricing->save();
        return back()->with('Add', 'Pricing Added');
    }
    function priceDelete($id){
        $price = Pricing::findOrFail($id);
        $price->delete();
        return back()->with('Delete', 'Pricing Added');
    }
    function PriceEdit($id){
        return view('admin.portfolio.service.pricing-edit',[
            'pricing' => Pricing::findOrFail($id),
        ]);
    }
    function PricingUpdate(Request $request){
        $pricing = Pricing::findOrFail($request->id);
        $pricing->name      = $request->name;
        $pricing->sign      = $request->sign;
        $pricing->price     = $request->price;
        $pricing->duration  = $request->duration;
        $pricing->icon      = $request->icon;
        $pricing->link      = $request->link;
        $pricing->button    = $request->button;
        $pricing->text      = $request->text;
        $pricing->save();
        return redirect()->route('ServiceSection')->with('Add', 'Pricing Updated');
    }
}
