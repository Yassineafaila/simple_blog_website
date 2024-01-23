@extends('layouts.layout')
@section('content')
    @include('partials._hero')
    @include('partials._search')
    <div class="container mx-auto">
        <div class="container px-4 py-4 mb-4"><h1 class="border-l-4 border-red-500 px-4 font-bold text-xl md:text-2xl">Latest Posts</h1></div>
    <x-container>
        @foreach ($posts as $post)
            <x-post :post="$post" />
        @endforeach
    </x-container>
    <div class="mt-4 p-4">{{$posts->links()}}</div>
    </div>
@endsection
