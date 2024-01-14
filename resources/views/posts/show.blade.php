@extends('layouts.layout');
@section('content')
<a href="/" class="inline-block text-black ml-4 mb-4"
        ><i class="fa-solid fa-arrow-left"></i> Back
      </a>
      <div class="mx-4">
        <div class="rounded">
          <div class="flex flex-col items-center justify-center text-center">
            <img class="w-full md:block h-1/3" src="{{$post->cover ? asset("storage/".$post->cover) : asset("/images/post.png")}}" alt="" />
            <div class="flex items-center relative mt-4">
              <img
                alt="authProfile"
                src="{{asset('images/no-image.jpg')}}"
                class="absolute -top-10 left-14 w-10 rounded-full h-10"
              />
              <span class="ms-4 mt-4 font-bold">Mark Thompson</span>
            </div>
            <h3 class="text-xl md:text-2xl mb-3 font-bold mt-4">
              {{$post->title}}
            </h3>
            {{-- ----component-categories--- --}}
              <x-categories :categories="$post->categories"/>
            <div>
                @php
                    $date=date_format($post->created_at,"M,d Y");
                @endphp
                <div class="font-bold text-gray-400 mt-2 mb-4">{{$date}}</div>
              </div>
              <div class="text-base md:text-lg space-y-6 text-start">
                <p>{{$post->content}}</p>
              </div>
            </div>
          </div>
          <div class="flex mt-4 items-center justify-start">

            @auth
                @if (auth()->user()->id === $post->user_id)
                <a href="/posts/{{$post->id}}/edit" class="font-bold">
              <i class="fa-solid fa-pen-to-square"></i>
              Edit
            </a>
                <form method="POST" action="/posts/{{$post->id}}" class="my-0">
                @csrf
                @method("delete")
              <button type="submit" class="text-buttonBg ms-4 font-bold">
                <i class="fa-solid fa-trash ms-1"></i>Delete
              </button>
            </form>

                @else
                    <button type="button" class="me-2 font-bold" disabled >comment</button>
                    <button type="button" class="ms-2 font-bold">Share</button>
                @endif
            @endauth
          </div>
        </div>
      </div>
@endsection
