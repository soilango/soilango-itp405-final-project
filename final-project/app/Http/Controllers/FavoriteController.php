<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function addFavorite(Request $request) {
        $favorite = new Favorite();
        $favorite->user_id = $request->input('user_id');
        $favorite->post_id = $request->input('postId');

        // dd($request);
        $exists = Favorite::where('post_id', '=', $request->input('postId'))->first();

        // $count = count($favorites);

        // dd($exists);

        if ($exists) {
            return redirect()->route('profile.index')->with('error', "This post is already in favorites!");
        } else {
            $favorite->save();
            return redirect()->route('profile.index')->with('success', "Successfully added to favorites!");
        }
    }

    public function removeFavorite(Request $request) {
        $favorite = Favorite::find($request->input('favoriteId'));

        if ($favorite) {
            $favorite->delete();

            return redirect()
            ->route('profile.index')
            ->with('success', "You have successfully deleted from your favorites!");

        }

        else {
            return redirect()
            ->route('profile.index')
            ->with('error', "Deletion error: favorite not found.");
        }
    }
}
