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
        $formFields = $request->validate([
            "reply" => "required"
        ]);
        $formFields["user_id"] = Auth::id();
        $formFields["post_id"] = $post->id;
        $formFields["comment_Id"] = $comment->id;
        $formFields["content"] = $request->reply;
        Reply::create($formFields);
        return  redirect()->back()->with("message", "The reply has been created successfully.");
    }
}
