<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    //Store the like
    public function liked(Post $post,Comment $comment)
    {
        $userAlreadyLikedThisComment = Like::where([
            ["user_id", "=", Auth::id()],
            ["comment_id", "=", $comment->id]
        ])->first();

        if ($userAlreadyLikedThisComment) {
            // unlike this comment
            $userAlreadyLikedThisComment->delete();
            return redirect()->back()->with("message", "");
        }

        $data["user_id"] = Auth::id();
        $data["comment_Id"] = $comment->id;
        Like::create($data);

        return redirect()->back()->with("message", "liked");
    }
    }

