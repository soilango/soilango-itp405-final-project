<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Models\Post;
use App\Models\Comment;

// use DB;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user'])->get();
        $count = count($posts);

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
        $post = Post::with(['user', 'comments'])->where('id', '=', $id)->first();


        $commentCount = count($post->comments);

        $comments = Comment::with(['user'])->where('post_id', '=', $id)->orderBy('updated_at', 'DESC')->get();

        return view('post/show', [
            'user' => Auth::user(),
            'post' => $post,
            'commentCount' => $commentCount,
            'comments' => $comments,
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
        $post->user_id = $request->input('user_id');

        $post->save();

        return redirect()
            ->route('post.index')
            ->with('success', "Your post titled '{$request->input('title')}' has successfully been posted!");

        
    }
}
