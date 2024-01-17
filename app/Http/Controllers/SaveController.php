<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SaveController extends Controller
{
    //
    //Saved the post
    public function savePost(Post $post)
    {


        // Check if the user has saved the specified post
        $isSaved = auth()->user()->saves()->where('post_id', $post->id)->exists();

        if ($isSaved) {
            // Detach the specified post from the user's saves
            auth()->user()->saves()->delete($post->id);

            return redirect()->back();
        } else {
            // Save the post for the authenticated user
            auth()->user()->saves()->create(['post_id' => $post->id]);
            return redirect()->back()->with("message", "Post saved successfully");
        }
    }
}
