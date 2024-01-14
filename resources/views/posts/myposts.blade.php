@extends('layouts.layout')
@section('content')
<x-container>
    @foreach ($posts as $post)
        <x-post :post="$post"/>
        @endforeach
</x-container>

@endsection
