<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    public function addComment($id) {
        $post = Post::with(['user'])->where('id', '=', $id)->first();

        return view('comment/add', [
            'user' => Auth::user(),
            'post' => $post,
        ]);
    }

    public function createComment(Request $request) {
        $request->validate([
            'body' => 'required',
        ]);

        $comment = new Comment();
        $comment->body = $request->input('body');
        $comment->user_id = $request->input('user_id');
        $comment->post_id = $request->input('postId');
        

        $comment->save();

        return redirect()
            ->route('post.show', [$request->input('postId')])
            ->with('success', "Your comment has successfully been posted!");

    }

    public function editComment($id) {
        $comment = Comment::with(['post', 'user'])->where('id', '=', $id)->first();

        return view('comment/edit', [
            'user' => Auth::user(),
            'comment' => $comment,
        ]);
    }

    public function submitEdit(Request $request) {
        $request->validate([
            'body' => 'required',
        ]);

        $comment = Comment::find($request->input('commentId'));
        $comment->body = $request->input('body');

        $comment->save();


        return redirect()
            ->route('post.show', [$request->input('postId')])
            ->with('success', "Your comment has successfully been edited!");
    }

    public function deleteComment(Request $request) {
        $comment = Comment::find($request->input('commentId'));

        if ($comment) {
            $comment->delete();

            return redirect()
            ->route('post.show', [$request->input('postId')])
            ->with('success', "Your comment has successfully been deleted!");

        }

        else {
            return redirect()
            ->route('post.show', [$request->input('postId')])
            ->with('error', "Deletion error: comment not found.");
        }


    }

}
