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
        $favorites = Favorite::with(['post'])->where('user_id', '=', $user->id)->get();

        $count = count($favorites);

        return view('profile/index', [
            'user' => Auth::user(),
            'favorites' => $favorites,
            'favoritesCount' => $count,
        ]);
    }
}
