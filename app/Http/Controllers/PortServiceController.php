<?php

namespace App\Http\Controllers;

use App\Models\Pricing;
use App\Models\PricingSection;
use App\Models\Service;
use App\Models\ServiceSection;
use Illuminate\Http\Request;

class PortServiceController extends Controller
{
    function ServiceSection(){
        return view('admin.portfolio.service.services',[
            'servicesection'    => ServiceSection::all(),
            'services'          => Service::all(),
            'pricings'          => PricingSection::all(),
            'prices'            => Pricing::all(),
        ]);
    }
    function ServiceSectionAdd(Request $request){
        $service = new ServiceSection();
        $service->name = $request->name;
        $service->text = $request->text;
        $service->save();
        return back()->with('ServicesAdd', $request->name.' Added!');
    }
    function ServiceSectionUpdate(Request $request){
        $service = ServiceSection::findOrFail($request->id);
        $service->name = $request->name;
        $service->text = $request->text;
        $service->save();
        return redirect()->route('ServiceSection')->with('ServicesAdd', $request->name.' Updated!');
    }
    function ServiceSectionEdit($id){
        return view('admin.portfolio.service.services-section-update',[
            'sersec'         => ServiceSection::findOrFail($id),
            'servicesection'    => ServiceSection::all(),
        ]);
    }
    function ServiceAdd(Request $request){
        $service                = new Service();
        $service->service_id    = $request->service_id;
        $service->name          = $request->name;
        $service->icon          = $request->icon;
        $service->text          = $request->text;
        $service->save();
        return back()->with('ServiceAdd', $request->name.' Added');
    }
    function ServiceDelete($id){
        $ServiceDelete = Service::findOrfail($id);
        $ServiceDelete->delete();
        return back()->with('ServiceDelete', $ServiceDelete->name.' Deleted');
    }
    function ServiceEdit($id){
        return view('admin.portfolio.service.service-edit',[
            'service' => Service::findOrFail($id),
        ]);
    }
    function ServiceUpdate(Request $request){
        $service                = Service::findOrFail($request->id);
        $service->name          = $request->name;
        $service->icon          = $request->icon;
        $service->text          = $request->text;
        $service->save();
        return redirect()->route('ServiceSection')->with('ServiceUpdate', $request->name.' Updated!');
    }

}
