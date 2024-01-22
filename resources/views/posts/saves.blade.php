@extends('layouts.layout')
@section('content')
    @unless (count($posts) === 0)
        <div class="container mx-auto">
           <div class="container mx-auto">
             <h1 class="text-xl md:text-2xl font-bold mt-4 mb-4">Archived Posts ({{count($posts)}})</h1>
           </div>
            <x-container>
            @foreach ($posts as $post)
                <div>
                    <div class="">
            <img class="w-full md:block h-96" src="{{$post->cover ? asset("storage/".$post->cover) : asset("/images/post.png")}}" alt="" />
            <div>
              <div
                class="flex w-full justify-between items-center font-bold text-xl mt-3 mb-1.5"
              >
                <a href="/posts/{{$post->post->id}}" class="text-lg"
                  >{{$post->post->title}}
                </a>
              </div>
              <div class="text-base font-normal text-gray-400 mb-3">
                {{$post->post->description}}
              </div>
              <div class="flex items-center w-full justify-between">
                <div class="flex items-center">
                  <img
                    alt="authProfile"
                    src="{{asset('images/no-image.jpg')}}"
                    class="w-10 rounded-full h-10"
                  />
                  <span class="ms-4 font-bold">{{$post->user->name}}</span>
                </div>
                @php
                    $date=date_format($post->created_at,"M,d Y");
                @endphp
                <div class="font-bold">{{$date}}</div>
              </div>
              {{-- ----component-categories--- --}}
              <x-categories :categories="$post->post->categories"/>
              <div class="text-lg mt-4"></div>
            </div>
          </div>
                </div>
            @endforeach
        </x-container>
        </div>
    @else
        <div class="container mx-auto">
            <p class="text-black text-2xl text-center mb-3">There's no saved posts</p>
            <div class="text-center">
                <i class="fa-solid fa-face-smile text-5xl"></i>
            </div>
        </div>
    @endunless
@endsection
