<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        $pagetitles = 'profile';
        return view('admin.profile' , compact('pagetitles'));
    }
}

?>