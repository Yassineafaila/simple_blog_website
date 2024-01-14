@extends('layouts.layout');
@section('content')
<x-card-container >
    <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Edit a Post</h2>
            <p class="mb-4">Edit : {{$post->title}}</p>
    </header>
    <form action="/posts/{{$post->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("put")
            <div class="mb-6">
              <label for="title" class="inline-block text-lg mb-2">Title</label>
              <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="title"
                value="{{$post->title}}"
              />
              @error('title')
              <p class="text-red-200 text-xs mt-1">{{$message}}</p>
              @enderror
            </div>

            <div class="mb-6">
              <label for="description" class="inline-block text-lg mb-2"
                >Description</label
              >
              <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="description"
                value="{{$post->description}}"
                placeholder="a small description for the post"
              />
              @error('description')
              <p class="text-red-200 text-xs mt-1">{{$message}}</p>
              @enderror
            </div>

            <div class="mb-6">
              <label for="categories" class="inline-block text-lg mb-2">
                Categories
              </label>
              <select
                name="categories"
                class="border border-gray-200 rounded p-2 w-full"
              >
                <option value="technology">Technology</option>
                <option value="travel">Travel</option>
                <option value="health-wellness">Health & Wellness</option>
                <option value="food-recipes">Food & Recipes</option>
                <option value="lifestyle">Lifestyle</option>
                <option value="Social Media">Social Media</option>
                <option value="Marketing">Marketing</option>
              </select>
              @error('categories')
              <p class="text-red-200 text-xs mt-1">{{$message}}</p>
              @enderror
            </div>

            <div class="mb-6">
              <label for="image" class="inline-block text-lg mb-2">
                Image for The post
              </label>
              <img class="w-full md:block" src="{{$post->cover ? asset("storage/".$post->cover) : asset("/images/post.png")}}" alt="" />
              <input
                type="file"
                class="border border-gray-200 rounded p-2 w-full"
                name="cover"
              />
              @error('cover')
              <p class="text-red-200 text-xs mt-1">{{$message}}</p>
              @enderror
            </div>

            <div class="mb-6">
              <label for="content" class="inline-block text-lg mb-2">
                Content
              </label>
              <input class="border border-gray-200 rounded p-2 w-full" type="text" name="content" value="{{$post->content}}"/>
              @error('content')
              <p class="text-red-200 text-xs mt-1">{{$message}}</p>
              @enderror
            </div>

            <div class="mb-6">
              <button
              type="submit"
                class="bg-buttonBg text-white rounded py-2 px-4 hover:bg-black"
              >
                Edit Post
              </button>
              <a href="/" class="text-black ml-4"> Back </a>
            </div>
          </form>
</x-card-container>

@endsection
