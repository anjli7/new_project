<?php 


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

class ApplicationController extends Controller
{
    public function index()
    {
        $pageTitles = 'Application'; 
        return view('admin.application' , compact('pageTitles'));
    }
}

?>