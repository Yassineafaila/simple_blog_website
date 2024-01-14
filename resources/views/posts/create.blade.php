@extends('layouts.layout')
@section('content')
<x-card-container>
    <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Create a Post</h2>
            <p class="mb-4">Post to share your ideas</p>
          </header>

          <form action="/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
              <label for="title" class="inline-block text-lg mb-2">Title</label>
              <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="title"
                value="{{old("title")}}"
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
                value="{{old("description")}}"
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
              <input
                type="file"
                class="border border-gray-200 rounded p-2 w-full"
                name="cover"
              />
               @error('image')
              <p class="text-red-200 text-xs mt-1">{{$message}}</p>
              @enderror
            </div>

            <div class="mb-6">
              <label for="content" class="inline-block text-lg mb-2">
                Content
              </label>
              <textarea
                class="border border-gray-200 rounded p-2 w-full"
                name="content"
                value="{{old("content")}}"
                rows="10"
                placeholder="Include tasks, requirements, salary, etc"
              ></textarea>
               @error('content')
              <p class="text-red-200 text-xs mt-1">{{$message}}</p>
              @enderror
            </div>

            <div class="mb-6">
              <button
              type="submit"
                class="bg-buttonBg text-white rounded py-2 px-4 hover:bg-black"
              >
                Create Post
              </button>
              <a href="/" class="text-black ml-4"> Back </a>
            </div>
          </form>
</x-card-container>
@endsection
