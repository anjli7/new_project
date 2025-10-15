<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
       
        $pagetitles = 'users';
        return view('admin.users' , compact('pagetitles'));
    }
}
