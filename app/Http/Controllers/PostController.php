<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //Show All Posts
    public function index(Request $request){

        return view(
            "posts.index",
            [
                "heading" => "Latest posts",
                "posts" => Post::latest()->filter(request(["category", "search"]))->paginate(5)
            ]
        );
    }
    //Show My Posts
    public function ShowMyPosts()
    {
        $myPosts = User::find(Auth::id())->posts;
        return view("posts.myposts", ["heading" => "My Posts", "posts" => $myPosts]);
    }
    //Show Single Post
    public function show(Post $post)
    {
        return view("posts.show", ["post" => $post]);
    }

    //Show Create Page Post
    public function create()
    {
        return view("posts.create");
    }

    //Store New Post
    public function store(Request $request)
    {
        $formFields = $request->validate([
            "title" => "required",
            "description" => "required",
            "categories" => "required",
            "content" => "required",
            "cover" => ["required", "image"]
        ]);
        if ($request->hasFile("cover")) {

            $formFields["cover"] = $request->file("cover")->store("covers", "public");
        }
        // Retrieve the currently authenticated user...
        $user = Auth::user();
        //Retrieve the currently authenticated user's Id
        $id = Auth::id();
        $formFields["user_id"] = $id;
        Post::create($formFields);
        return redirect("/")->with("message", "The Post has been created successfully.");
    }

    //Show Edit Page Post
    public function edit(Post $post)
    {
        return view("posts.edit", ["post" => $post]);
    }

    //Update Post
    public function update(Request $request, Post $post)
    {
        $formFields = $request->validate([
            "title" => "required",
            "description" => "required",
            "categories" => "required",
            "content" => "required",
            "cover" => ["required", "image"]
        ]);
        if ($request->hasFile("cover")) {
            $formFields["cover"] = $request->file("cover")->store("covers", "public");
        }
        $post->update($formFields);
        return redirect("/")->with("message", "The Post updated successfully.");
    }

    // Delete Post
    public function delete(Post $post, Request $request)
    {
        $currentUser = auth()->user()->id;
        if ($currentUser === $post->user_id) {
            $post->delete();
            return redirect('/')->with("message", "The Post deleted successfully. ");
        }
    }
}
