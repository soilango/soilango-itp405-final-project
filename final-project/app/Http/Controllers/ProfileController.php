<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile/index', [
            'user' => Auth::user(),
        ]);
    }
}
