@extends('layouts.layout')
@section('content')
    @unless (count($posts) === 0)
        <div class="container mx-auto mt-4 py-4">

            <div class="container px-4 py-4 mb-4"><h1 class="border-l-4 border-red-500 px-4 font-bold text-xl md:text-2xl">My Posts ({{ count($posts) }})</h1></div>
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
