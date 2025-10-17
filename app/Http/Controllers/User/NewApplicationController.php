<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\user\Application;
use Illuminate\Http\Request;

class NewApplicationController extends Controller
{
    public function index()
    {
        return view('user.newapplication');
    }
}
