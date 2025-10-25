<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\MediaFileService;

class UserProfileController extends Controller
{
    protected $mediaService;
    
    public function index()
    {
        return view('user.profile');
    }

}