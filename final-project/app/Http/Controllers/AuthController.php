<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function logout()
    {
        Auth::logout();
        
        return redirect()->route('login');
    }

    public function loginForm()
    {
        return view('auth/login');
    }

    public function login(Request $request)
    {
        // dd($request);
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $loginWasSuccessful = Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        // dd($loginWasSuccessful);

        if ($loginWasSuccessful) {
            return redirect()->route('profile.index')->with('success', "Login success!");
        } else {
            return redirect()->route('login')->with('error', 'Invalid credentials.');
        }
    }
}
