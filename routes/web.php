<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommanController;
use App\Http\Controllers\TdsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\MyApplicationController;
use App\Http\Controllers\User\NewApplicationController;
use App\Http\Controllers\User\UserProfileController;




// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [CommanController::class, 'Home'])->name('home');
Route::post('/', [CommanController::class, 'InsertHome'])->name('home.InsertHome');

Route::get('/about', [CommanController::class, 'About'])->name('about');
Route::post('/about', [CommanController::class, 'InsertAbout'])->name('about.InsertAbout');

Route::get('/contact', [CommanController::class, 'Contact'])->name('contact');
Route::post('/contact', [CommanController::class, 'InsertContact'])->name('contact.InsertContact');

Route::get('/audite' , [CommanController::class, 'Audite'])->name('audite');
Route::post('/audite', [CommanController::class, 'InsertAudite'])->name('audite.InsertAudite');

Route::get('/GST', [CommanController::class, 'GST'])->name('GST');
Route::post('/GST', [CommanController::class, 'InsertGST'])->name('GST.InsertGST');


Route::get('/MCA' , [CommanController::class, 'MCA'])->name('MCA');
Route::post('/MCA', [CommanController::class, 'InsertMCA'])->name('MCA.InsertMCA');

Route::get('/ITD' , [CommanController::class, 'ITD'])->name('ITD');

Route::get('/TDS' , [TdsController::class, 'index'])->name('TDS');
Route::post('/TDS', [TdsController::class, 'calculate'])->name('TDS.calculate');




Route::prefix('admin')->name('admin.')->middleware(['auth','role:admin'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/users', [UsersController::class, 'index'])->name('users');
    Route::get('/applications', [ApplicationController::class, 'index'])->name('applications');

    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
    Route::delete('/contact/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');

    Route::get('/service', [ServiceController::class, 'index'])->name('service');
    Route::delete('/service/{id}', [ServiceController::class, 'destroy'])->name('service.destroy');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
});


Route::prefix('user')->name('user.')->middleware(['auth','role:user'])->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('/my-application', [MyApplicationController::class, 'index'])->name('myapplication');
    Route::get('/new-application', [NewApplicationController::class, 'index'])->name('newapplication');
    Route::get('/profile', [UserProfileController::class, 'index'])->name('profile');
});



// Route::prefix('staff')->name('staff.')->middleware(['auth','role:staff'])->group(function () {
    // Route::get('/dashboard', [StaffController::class,'index'])->name('dashboard');
    // Route::get('/applications', [ApplicationController::class,'staffIndex'])->name('applications.index');
    // Route::get('/profile', [StaffController::class,'profile'])->name('profile.index');
// });


Route::get('/register', [RegistrationController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegistrationController::class, 'register'])->name('register.post');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');





