@extends('layouts.layout')
@section('content')
    @unless (count($posts) === 0)
        <div class="container mx-auto">
            <div class="container mx-auto">
                <h1 class="text-xl md:text-2xl font-bold mt-4 mb-4">My Posts ({{count($posts)}})</h1>
            </div>
            <x-container>
            @foreach ($posts as $post)
                <x-post :post="$post" />
            @endforeach
        </x-container>
        </div>
    @else
        <div class="container mx-auto">
            <p class="text-black text-2xl text-center mb-3">No posts yet, but the pen is poised and ready for your magic! </p>
            <div class="text-center">
                <i class="fa-solid fa-face-smile text-5xl"></i>
            </div>
        </div>
    @endunless

@endsection
