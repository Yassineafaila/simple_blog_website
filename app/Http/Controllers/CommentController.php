<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    //Store the Comment
    public function store(Post $post, Request $request)
    {
        $formFields = $request->validate([
            "comment" => "required",
        ]);
        $formFields["post_id"] = $post->id;
        $formFields["user_id"] = Auth::id();

        Comment::create($formFields);
        return redirect()->back()->with("success", "The comment has been created successfully.");
    }
}
