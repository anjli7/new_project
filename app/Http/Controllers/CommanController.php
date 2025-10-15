<?php

namespace App\Http\Controllers;

use App\Models\Service_form;
use App\Models\Contact;
use Illuminate\Http\Request;

class CommanController extends Controller
{
    public function Home()
    {
        $contacts = Contact::all();
        return view('pages.home' , compact('contacts'));
    } 
    public function InsertHome(Request $request){
        $this->saveContact($request);
        return redirect()->back()->with('success', 'Form submitted successfully!');
    }

    public function About()
    {
        return view('pages.about');
    }
    public function InsertAbout(Request $request){
        $this->saveContact($request);
        return redirect()->back()->with('success', 'Form submitted successfully!');
    }

    public function Contact()
    {
        return view('pages.contact');
    }
    public function InsertContact(Request $request){
        $this->saveContact($request);
        return redirect()->back()->with('success', 'Form submitted successfully!');
    }

    public function Audite(){
        return view('pages.audite');
    }
    public function InsertAudite(Request $request)
    {
        $this->saveContact($request);
        return redirect()->back()->with('success', 'Form submitted successfully!');
    }
    
    public function TDS()
    {
        return view('pages.TDS');
    }

    public function ITD(){
        return view('pages.ITD');
    }

    public function GST(){
        return view('pages.GST');
    }
    public function InsertGST(Request $request)
    {
    try {
        $this->serviceContact($request);
        return response()->json(['success' => true]);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'error' => $e->getMessage()]);
    }
    }

    public function MCA()
    {
        return view('pages.mca');
    }
    public function InsertMCA(Request $request)
    {
    try {
        // return response()->json(['debug_data' => $request->all()]); 


        $this->serviceContact($request);
        return response()->json(['success' => true]);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'error' => $e->getMessage()]);
    }
    }


    
    private function saveContact(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject ?: null;
        $contact->message = $request->message ?: null;
        $contact->save();
    }


    private function serviceContact(Request $request){
        $service_form = new Service_form();
        $service_form->name = $request->name;
        $service_form->email = $request->email;
        $service_form->phone = $request->phone;
        $service_form->business = $request->business ?: null;
        $service_form->service = $request->service ?:null;
        $service_form->message = $request->message ?: null;
        $service_form->save();
    }

}
