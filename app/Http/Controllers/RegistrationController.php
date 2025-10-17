<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.registration');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'number' => 'required',
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',

            ],
        ], [
            'password.regex' => 'Password must contain at least one letter, one number, and one special character.'
        ]);

        Login::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'number' => $data['number'],
            'password' => Hash::make($data['password']),
            'email_verified_at' => now(),                      
            'remember_token' => Str::random(10),
            'role' => 'user',

        ]);

        return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
    }
}
