@extends('layouts.layout')
@section('content')
    @include('partials._hero')
    @include('partials._search')
    <x-container>
        @foreach ($posts as $post)
            <x-post :post="$post" />
        @endforeach
    </x-container>
@endsection
