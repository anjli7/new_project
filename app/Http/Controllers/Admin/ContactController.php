<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $pageTitles = 'Contact';
        $inquiries = Contact::orderBy('created_at', 'desc')->get();
        return view('admin.contact' , compact('pageTitles' , 'inquiries'));
    }
    
    public function destroy($id)
    {
    $contact = \App\Models\Contact::find($id);

    if (!$contact) {
        return response()->json([
            'success' => false,
            'message' => 'Inquiry not found.'
        ], 404);
    }

    $contact->delete();

    return response()->json([
        'success' => true,
        'message' => 'Inquiry deleted successfully.'
    ]);
}

}
?>