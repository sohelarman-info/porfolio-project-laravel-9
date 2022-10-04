<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactSection;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    function ContactSection(){
        return view('admin.portfolio.contact.contact',[
            'contactsection'    => ContactSection::all(),
            'contacts'          => Contact::all(),
            'payments'          => PaymentMethod::orderBy('id', 'DESC')->get(),
        ]);
    }
    function ContactSectionEdit($id){
        return view('admin.portfolio.contact.contact-section-update',[
            'contactsection' => ContactSection::findOrFail($id),
        ]);
    }
    function ContactSectionUpdate(Request $request){
        $contact_section = ContactSection::findOrFail($request->id);
        $contact_section->name  = $request->name;
        $contact_section->text  = $request->text;
        $contact_section->save();
        return redirect()->route('ContactSection')->with('Add', 'Contact Section Updated');
    }
    function ContactSectionAdd(Request $request){
        $contact_section        = new ContactSection();
        $contact_section->name  = $request->name;
        $contact_section->text  = $request->text;
        $contact_section->save();
        return back()->with('Add', 'Contact Section Added');
    }
    function ContactAdd(Request $request){
        $contact = new Contact();
        $contact->number1   = $request->number1;
        $contact->number2   = $request->number2;
        $contact->email1    = $request->email1;
        $contact->email2    = $request->email2;
        $contact->text      = $request->text;
        $contact->save();

        return back()->with('ContactAdd', 'Contact Added');
    }
    function ContactUpdate(Request $request){
        $contact = Contact::findOrFail($request->id);
        $contact->number1   = $request->number1;
        $contact->number2   = $request->number2;
        $contact->email1    = $request->email1;
        $contact->email2    = $request->email2;
        $contact->text      = $request->text;
        $contact->save();

        return back()->with('ContactAdd', 'Contact Updated');
    }
}
