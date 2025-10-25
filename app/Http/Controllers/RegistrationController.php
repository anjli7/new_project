<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
            'email' => [
                'required',
                'email',
                'unique:users',
                'max:255',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'
            ],
            'number' => 'required|string|max:15',
            'password' => [
                'required',
                'string',
                'min:6',
                'confirmed',
            ],
        ], [
            'email.regex' => 'Please enter a valid email address format.',
        ]);

        $password = $data['password'];
         $is_strong = preg_match('/[0-9]/', $password) && preg_match('/[A-Za-z]/', $password) && preg_match('/[^A-Za-z0-9]/', $password);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'number' => $data['number'],
            'password' => Hash::make($data['password']),
            'remember_token' => Str::random(10),
            'role' => 'user',
        ]);

        return redirect()->route('login')->with('success', 'Registration successful! You can now log in.');
    }
}
