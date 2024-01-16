@extends('layouts.layout');
@section('content')
    <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <div class="rounded">
            <div class="flex flex-col items-center justify-center text-center">
                <img class="w-full md:block h-1/3"
                    src="{{ $post->cover ? asset('storage/' . $post->cover) : asset('/images/post.png') }}" alt="" />
                <div class="flex items-center relative mt-4">
                    <img alt="authProfile" src="{{ asset('images/no-image.jpg') }}"
                        class="absolute -top-10 left-14 w-10 rounded-full h-10" />
                    <span class="ms-4 mt-4 font-bold">{{ $post->user->name }}</span>
                </div>
                <h3 class="text-xl md:text-2xl mb-3 font-bold mt-4">
                    {{ $post->title }}
                </h3>
                {{-- ----component-categories--- --}}
                <x-categories :categories="$post->categories" />
                <div>
                    @php
                        $date = date_format($post->created_at, 'M,d Y');
                    @endphp
                    <div class="font-bold text-gray-400 mt-2 mb-4">{{ $date }}</div>
                </div>
                <div class="text-base md:text-lg space-y-6 text-start">
                    <p>{{ $post->content }}</p>
                </div>
            </div>
        </div>
        <div class="flex mt-4 items-center justify-start">

            @auth
                @if (auth()->user()->id === $post->user_id)
                    <a href="/posts/{{ $post->id }}/edit" class="font-bold">
                        <i class="fa-solid fa-pen-to-square"></i>
                        Edit
                    </a>
                    <form method="POST" action="/posts/{{ $post->id }}" class="my-0">
                        @csrf
                        @method('delete')
                        <button type="submit" class="text-buttonBg ms-4 font-bold">
                            <i class="fa-solid fa-trash ms-1"></i>Delete
                        </button>
                    </form>
                @else
                    <div class="d-flex flex-col w-96">
                        <div>
                            <button type="button" class="me-2 btnComment font-bold hover:text-buttonBg">comment <i
                                    class="fa-solid fa-comment"></i></button>
                            <button type="button" class="ms-2 font-bold  hover:text-buttonBg">Share <i
                                    class="fa-solid fa-share"></i></button>
                        </div>
                        <form method="post" action="/posts/{{ $post->id }}/comment">
                            @csrf
                            <input class="border mt-2 border-gray-200 rounded  p-2 w-full hidden" name="comment"
                                value="{{ old('comment') }}" id="inputComment" placeholder="Enter The Comment Here"></input>
                            <button type="submit"
                                class="hidden buttonSubmitComment bg-buttonBg px-4 mt-2 rounded-md text-white font-medium py-2">Add
                                Comment</button>
                        </form>
                    </div>
                @endif
            @endauth
        </div>
    </div>
    </div>
    <script>
        $(".btnComment").on("click", function() {
            $("#inputComment").css("display", "block")
            $(".buttonSubmitComment").css("display", "block")
        })
    </script>
@endsection
