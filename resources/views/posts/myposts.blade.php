@extends('layouts.layout')
@section('content')
    @unless (count($posts) === 0)
        <x-container>
            @foreach ($posts as $post)
                <x-post :post="$post" />
            @endforeach
        </x-container>
    @else
        <div class="container mx-auto">
            <p class="text-black text-2xl text-center mb-3">No posts yet, but the pen is poised and ready for your magic! </p>
            <div class="text-center">
                <i class="fa-solid fa-face-smile text-5xl"></i>
            </div>
        </div>
    @endunless

@endsection
