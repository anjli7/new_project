<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use App\Models\Application; 
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        
        $pageTitles = 'Dashboard';
        return view('admin.dashboard' , compact('pageTitles'));
    }
}

?>