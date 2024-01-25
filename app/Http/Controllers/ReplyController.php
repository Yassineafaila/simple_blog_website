<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Reply;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    //

    //Store The Reply
    public function store(Request $request, Post $post, Comment $comment)
    {
        $validatedData = $request->validate(["reply" => "required"]);

        Reply::create([
            "user_id" => Auth::id(),
            "post_id" => $post->id,
            "comment_id" => $comment->id,
            "content" => $validatedData['reply'],
        ]);

        return redirect()->back()->with("success", "Reply added successfully.");
    }
}
