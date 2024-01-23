@extends('layouts.layout');
@section('content')
    <div class="container mx-auto">
        <a href="/" class="inline-block text-black ml-4 mb-4 text-base md:text-xl mt-4 font-bold"><i
            class="fa-solid fa-arrow-left text-red-500"></i> Back
    </a>
    <div class="mx-4">
        <div class="rounded">
            <div class="flex flex-col items-center justify-center text-center">
                <img class="w-full md:block h-1/3"
                    src="{{ $post->cover ? asset('storage/' . $post->cover) : asset('/images/post.png') }}" alt="" />
                <div class="flex items-center relative mt-4">
                    <a href="/users/{{ $post->user->name }}"><img alt="authProfile"
                            src="{{ $post->user->avatar ? asset('storage/' . $post->user->avatar) : asset('/images/no-image.jpg') }}"
                            class="absolute -top-10 left-14 w-10 rounded-full h-10" />
                    </a>
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
                    <div class="flex flex-col w-96">
                        <div class="flex items-center w-full">
                            <button type="button" class="me-2 btnComment font-bold hover:text-buttonBg">comment <i
                                    class="fa-regular fa-comment"></i></button>
                            <form class="mb-0 me-3" method="post" action="/posts/{{ $post->id }}/save">
                                @csrf
                                <button type="submit" class="ms-2 font-bold hover:text-buttonBg">Save
                                    @if (auth()->user()->saves()->where('post_id', $post->id)->first())
                                        <i class="fa-solid fa-bookmark text-red-500"></i>
                                    @else
                                        <i class="fa-regular fa-bookmark"></i>
                                    @endif
                                </button>
                            </form>
                            <button type="button" class="ms-2 font-bold  hover:text-buttonBg">Share <i
                                    class="fa-solid fa-share"></i></button>

                        </div>
                        <form method="post" action="/posts/{{ $post->id }}/comment">
                            <div class="comment_area hidden">
                                @csrf
                                <textarea rows="7" class="border mt-2 border-gray-200 rounded  p-2 w-full " name="comment"
                                    value="{{ old('comment') }}" placeholder="Enter The Comment Here"></textarea>
                                <button type="submit" class=" bg-buttonBg px-4 mt-2 rounded-md text-white font-semibold py-2">
                                    Submit</button>
                            </div>
                        </form>

                    </div>

            </div>
            @endif
        @endauth
        <div class="comments flex gap-6 flex-col mt-4 w-96">
            @foreach ($comments as $comment)
                <div class="flex flex-col gap-2 w-full ">
                    <div class="border border-gray-400 px-3 py-4 rounded ">
                        <div class="flex gap-1 items-center">
                            <img src="{{ $comment->user->avatar ? asset('storage/' . $comment->user->avatar) : asset('/images/no-image.jpg') }}"
                                alt="{{ $comment->user->name }}" class="w-10 h-10 rounded-full" />
                            <p>{{ $comment->user->name }}</p> |
                            @php
                                $date = date_format($comment->created_at, 'M,d Y');
                            @endphp
                            <p>{{ $date }}</p>
                        </div>
                        <p class="mt-3.5">{{ $comment->comment }}</p>
                    </div>
                    <div class="flex  gap-3 flex-col">
                        @auth
                            <form method="post" action="/posts/{{ $post->id }}/{{ $comment->id }}/like">
                                @csrf
                                <div class="flex items-center gap-2">
                                    <button type="submit">
                                        @if ($comment->likes->count())
                                            <i class="fa-solid fa-heart text-red-500"></i>
                                        @else
                                            <i class="fa-regular fa-heart "></i>
                                        @endif

                                        like {{ $comment->likes->count() }}
                                    </button>
                            </form>
                            <button class="btnReply" type="button" id="{{ $comment->id }}"> <i
                                    class="fa-regular fa-comment-dots"></i>
                                Reply</button>
                        </div>

                        <form method="post" action="/posts/{{ $post->id }}/{{ $comment->id }}/reply"
                            class="reply_area_{{ $comment->id }} hidden" id="{{ $comment->id }}">
                            @csrf
                            <textarea rows="3" class="border mt-2 border-gray-200 rounded  p-2 w-full " name="reply"
                                value="{{ old('reply') }}"placeholder="Enter The replay Here"></textarea>
                            <div>
                                <button type="submit"
                                    class="  bg-buttonBg px-3 mt-2 rounded-md text-white font-semibold py-1.5">
                                    Submit</button>
                                <button type="button"
                                    class="bg-gray-200 text-black font-semibold px-4 roudned-md py-2 hidden cancelReply">Cancel</button>
                            </div>
                        </form>
                        <div class="replies_area_{{ $comment->id }} hidden ms-5">
                            @foreach ($comment->replies as $reply)
                                <div class="border border-gray-400 px-3 py-4 rounded mb-2  ">
                                    <div class="flex gap-1 items-center ">
                                        <img src="{{ $reply->user->avatar ? asset('storage/' . $reply->user->avatar) : asset('/images/no-image.jpg') }}"
                                            alt="{{ $reply->user->name }}" class="w-10 h-10 rounded-full" />
                                        <p>{{ $reply->user->name }}</p> |
                                        @php
                                            $date = date_format($reply->created_at, 'M,d Y');
                                        @endphp
                                        <p>{{ $date }}</p>
                                    </div>
                                    <p class="mt-3.5">{{ $reply->content }}</p>
                                </div>
                            @endforeach
                        </div>
                    @endauth

                </div>
        </div>
        @endforeach
    </div>
    </div>
    </div>
    </div>
    <script>
        $(".btnComment").on("click", function() {
            $(".comment_area").toggleClass("hidden")
        })
        $(".btnReply").on("click", function(e) {
            $(`.replies_area_${$(this).attr("id")}`).toggleClass("hidden");
            $(`.reply_area_${$(this).attr("id")}`).toggleClass("hidden");

        })
    </script>
@endsection
