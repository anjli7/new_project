<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    // Show login/register page
    public function index()
    {
        if (Auth::check()) {
            $role = Auth::user()->role ?? 'user';
            return match($role) {
                'admin' => redirect()->route('admin.dashboard'),
                'staff' => redirect()->route('admin.dashboard'),
                default => redirect()->route('user.dashboard'),
            };
        }

        return view('auth.login');
    }

    // Registration
    public function register(Request $request)
    {
        logger('Registration attempt started');

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'mobile' => 'nullable|string|max:15',
        ]);

        logger('Registration validation passed for: ' . $request->email);

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password), // Hash password immediately
                'role' => 'user',
                'number' => $request->mobile,
            ]);

            logger('User created successfully: ' . $user->email . ' with ID: ' . $user->id);

            return redirect()->route('login')->with('success', 'Account created successfully! Please login with your credentials.');

        } catch (\Exception $e) {
            logger('Registration failed for ' . $request->email . ': ' . $e->getMessage());

            return back()->withErrors([
                'email' => 'Registration failed. Please try again or contact support if the problem persists.',
            ])->withInput();
        }
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        logger('Login attempt for email: ' . $request->email);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            logger('User found: ' . $user->email . ', Password hash: ' . substr($user->password, 0, 20) . '...');

            // Check if password matches (handles both bcrypt and other algorithms)
            $passwordMatches = false;

            // Try bcrypt first (Laravel standard)
            if (password_verify($request->password, $user->password)) {
                $passwordMatches = true;
                logger('Password verified with bcrypt');
            }
            // Try MD5 (common legacy format)
            elseif (hash('md5', $request->password) === $user->password) {
                $passwordMatches = true;
                logger('Password matched with MD5');
            }
            // Try SHA1 (another legacy format)
            elseif (hash('sha1', $request->password) === $user->password) {
                $passwordMatches = true;
                logger('Password matched with SHA1');
            }

            if ($passwordMatches) {
                logger('Password matches, proceeding with login');

                // If password matches but isn't bcrypt, rehash it for security
                if (!str_starts_with($user->password, '$2y$')) {
                    logger('Rehashing password to bcrypt');
                    $user->password = bcrypt($request->password);
                    $user->save();
                }

                logger('Logging in user: ' . $user->email);
                Auth::login($user, $request->boolean('remember'));
                $request->session()->regenerate();

                $role = $user->role ?? 'user';
                logger('User role: ' . $role);

                // Check if user is authenticated
                if (Auth::check()) {
                    logger('User is authenticated, redirecting...');
                } else {
                    logger('User authentication failed!');
                }

                return match($role) {
                    'admin' => redirect()->route('admin.dashboard'),
                    'staff' => redirect()->route('admin.dashboard'),
                    default => redirect()->route('user.dashboard'),
                };
            } else {
                logger('Password does not match for user: ' . $user->email);
            }
        } else {
            logger('No user found with email: ' . $request->email);
        }

        logger('Login failed for email: ' . $request->email);
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('email'));
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success','Logged out successfully');
    }

}
