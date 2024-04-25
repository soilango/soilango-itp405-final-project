<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user'])->get();
        $count = count($posts);

        // dd($posts->user->name);
        return view('post/index', [
            'user' => Auth::user(),
            'posts' => $posts,
            'count' => $count,
        ]);
    }

    public function addPost() {
        return view('post/add', [
            'user' => Auth::user(),
        ]);
    }

    public function show($id) {
        $post = Post::with(['user'])->where('id', '=', $id)->first();

        return view('post/show', [
            'user' => Auth::user(),
            'post' => $post,
        ]);

    }

    public function createPost(Request $request) {
        $request->validate([
            'title' => 'required',
            'cuisine' => 'required',
            'allergens' => 'required',
            'instructions' => 'required',
        ]);
        $post = new Post();
        $post->title = $request->input('title');
        $post->cuisine = $request->input('cuisine');
        $post->allergens = $request->input('allergens');
        $post->instructions = $request->input('instructions'); // bcrypt
        $post->username = $request->input('username');
        // dd($user);

        // dd($post);
        $post->save();

        return redirect()
            ->route('post.index')
            ->with('success', "Your post titled '{$request->input('title')}' has successfully been posted!");

        
    }
}
