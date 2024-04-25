<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;
use App\Models\Favorite;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $favorites = Favorite::where('username', '=', $user->username);
        dd($favorites);
        return view('profile/index', [
            'user' => Auth::user(),
        ]);
    }
}
