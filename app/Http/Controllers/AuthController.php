<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    //get register form 
    public function registerForm()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard'); 
        }
        
        return view('forms.register');
    }

    //handle regiser code
    public function register(AuthRequest $request)
    {
        $validated = $request->validated();

        $hashedPass = Hash::make($request->password);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hashedPass,
        ]);

        //make session
        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Registration successful!');
    }

    //get login form
    public function loginForm()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard'); 
        }

        return view('forms.login');
    }

    //handle login code
    public function login(AuthRequest $request)
    {

        if (Auth::attempt($request->only('email', 'password'))) {

            $request->session()->regenerate();

            // Authentication successful
            return redirect()->route('dashboard');
        }

        // Authentication failed
        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    public function logout(AuthRequest $request)
    {
        Auth::logout(); 

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('loginForm')->with('success', 'You have been logged out successfully.');
    }
}
