<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('halaman_auth/login');
    }

    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Check if user exists
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            // Redirect to registration if the user doesn't exist
            return redirect()->route('register')->with('error', 'User not found. Please register.');
        }

        // Attempt to log in the user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Redirect based on user role
            if ($user->role === 'admin') {
                return redirect()->route('dashboard'); // Admin dashboard
            } else {
                return redirect()->route('register'); // User landing page
            }
        }

        // If login fails
        return back()->withErrors(['email' => 'Invalid email or password']);
    }

    public function create()
    {
        return view('halaman_auth/register');
    }

    public function register(Request $request)
    {
        // Validate registration input
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:users|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|string|unique:users|max:20',
            'password' => 'required|min:6|confirmed',
        ]);

        // Create new user
        $user = User::create($request->only([
            'name',
            'username',
            'address',
            'email',
            'phone_number',
        ]) + [
            'password' => bcrypt($request->password),
            'role' => $request->role ?? 'user', // Default role as 'user'
        ]);

        // Log in the user
        Auth::login($user);

        return redirect()->route('login'); // Redirect to home or dashboard after successful registration
    }
}
