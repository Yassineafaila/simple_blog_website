<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    //Show All Posts
    public function index(Request $request)
    {

        return view(
            "posts.index",
            [
                "heading" => "Latest posts",
                "posts" => Post::latest()->filter(request(["category", "search"]))->paginate(3)
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
        //This Line Grabs All The Comments Of This Post
        $comment = Post::find($post->id)->comments;
        return view("posts.show", ["post" => $post, "comments" => $comment]);
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
            "description" => "required|min:50",
            "category_texts" => "required",
            "content" => "required|min:100",
            "cover" => ["required", "image"]
        ]);
        $formFields["categories"] = $request->category_texts;
        if ($request->hasFile("cover")) {
            $file = $request->file("cover");
            $name = $file->hashName(); // generate a unique or random name
            $extension = $file->extension(); // Determine the file's extension based on the file's MIME type...
            $formFields["cover"] = $request->file("cover")->store("covers", "public");
        }
        // Retrieve the currently authenticated user...
        // dd($formFields);
        $user = Auth::user();
        //Retrieve the currently authenticated user's Id
        $id = Auth::id();
        $formFields["user_id"] = $id;
        Post::create($formFields);
        return redirect("/")->with("success", "The Post has been created successfully.");
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
            "category_texts" => "required",
            "content" => "required",
            "cover" => ["nullable", "image"]
        ]);
        $formFields["categories"] = $request->category_texts;
        if ($request->hasFile("cover")) {
            $formFields["cover"] = $request->file("cover")->store("covers", "public");
        } else {
            $formFields["cover"] = $post->cover;
        }
        $post->update($formFields);
        return redirect("/")->with("success", "The Post updated successfully.");
    }

    // Delete Post
    public function delete(Post $post, Request $request)
    {
        $currentUser = auth()->user()->id;
        if ($currentUser === $post->user_id) {
            Storage::disk('public')->delete("{{$post->cover}}");
            $post->delete();
            return redirect('/')->with("success", "The Post deleted successfully. ");
        }
    }

    //Get All The Categories:
    public function getAllCategories(Request $request)
    {
        try {
            $result = [];
            $term = trim($request->q);

            if (empty($term)) {
                return response([]);
            }

            $categories = Category::search($term)->limit(5)->get();

            foreach ($categories as $category) {
                $result[] = ['id' => $category->id, 'text' => $category->name];
            }

            return response()->json($result);
        } catch (\Exception $e) {
            // Log the exception
            error_log($e);

            // Return a generic error response
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
}
