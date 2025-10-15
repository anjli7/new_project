<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Service_form;

class ServiceController extends Controller
{
    public function index()
    {
        $pageTitles = 'Service Inquiries';
        $inquiries = Service_form::orderBy('created_at', 'desc')->get();
        return view('admin.service', compact('pageTitles', 'inquiries'));
    }

    public function destroy($id)
    {
        $inquiry = Service_form::find($id);

        if (!$inquiry) {
            return response()->json([
                'success' => false,
                 'message' => 'Inquiry not found.'
                ], 404);
        }

        $inquiry->delete();

        return response()->json([
            'success' => true,
             'message' => 'Inquiry deleted successfully.'
            ]);
    }
}

?>