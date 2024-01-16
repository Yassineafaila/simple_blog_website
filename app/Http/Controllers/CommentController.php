<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //

    //Store the Comment
    public function store(Post $post, Request $request)
    {
        $formFields = $request->validate([
            "comment" => "required",
        ]);
        $formFields["post_id"]=$post->id;
        Comment::create($formFields);
        return redirect()->back()->with("message", "The comment has been created successfully.");
    }
}
