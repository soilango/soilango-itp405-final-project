<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function addFavorite(Request $request) {
        $favorite = new Favorite();
        $favorite->username = $request->input('username');
        $favorite->post_id = $request->input('postId');

        // dd($favorite);

        $favorite->save();

        return redirect()->route('profile.index')->with('success', "Successfully added to favorites!");
    }
}
