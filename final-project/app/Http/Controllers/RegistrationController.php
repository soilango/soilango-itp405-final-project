<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('registration/index');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,username',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);
        $user = new User();
        $user->username = $request->input('username');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password')); // bcrypt
        
        // dd($user);
        $user->save();

        Auth::login($user);
        return redirect()
            ->route('profile.index')
            ->with('success', "Welcome, {$request->input('name')}!");
    }
}
