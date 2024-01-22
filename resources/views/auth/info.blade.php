@extends('layouts.layout')
@section('content')
    <div class="container mx-auto profile_page py-4 ">
        <div
            class="relative shadow-lg rounded-md flex flex-col md:items-center between py-6 px-4 md:h-auto h-auto gap-3 mt-10 bg-white border">
            <div class="flex justify-between items-start">
                <img class="profile_pic md:w-36 md:h-36 w-14 h-14 block rounded-full md:absolute "
                    src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('/images/no-image.jpg') }}"
                    alt="{{ $user->name }}" />

                @if (auth()->user()->name == $user->name)
                    <a href="/settings"
                        class="bg-buttonBg text-base md:absolute md:right-0 md:mx-2 md:text-lg font-semibold block text-white py-2 px-4 rounded hover:bg-red-600 mt-3 md:mt-0">Edit
                        Profile</a>
                @else
                    <div></div>
                @endif
            </div>
            <div class="flex  md:items-center flex-col gap-2 md:mt-11">
                <p class="text-base md:text-4xl font-bold ">{{ $user->name }}</p>
                <p>{{ $user->bio }}</p>
                <p>Bio</p>
                @php
                    $dateJoind = date_format($user->created_at, 'M d,Y');
                @endphp
                <p class="text-gray-400 text-sm">Joined on {{ $dateJoind }}</p>

            </div>
        </div>
        <div class="container mt-4 pt-4  flex items-start justify-between gap-3 flex-wrap">
            <div class="bg-white border md:w-60 w-full p-4 rounded-md">
                <p class="mb-4 text-base text-gray-400"><i class="fa-regular fa-newspaper  me-2"></i>
                    {{ count($user->posts) }} posts published</p>
                <p class="mb-4 text-base text-gray-400"><i class="fa-regular fa-comment me-2"></i>
                    {{ count($user->comments) }} comments written</p>
            </div>
            <div class="flex-1  bg-white border rounded">
                <ul class="tabs flex list-none ">
                    <li class="tab me-2.5 cursor-pointer py-4  px-4 rounded-sm hover:bg-gray-500  "
                        onclick="showTab('tab1')">Recent Comment</li>
                    <li class="tab me-2.5 cursor-pointer  py-4 px-4 rounded-sm  hover:bg-gray-500  "
                        onclick="showTab('tab2')">Recent Posts</li>
                </ul>

                <div id="tab1" class="tab-content active">
                    @foreach ($user->comments as $comment)
                        <div class="p-5 border-t">
                            <h2 class="font-bold text-base md:text-xl mb-1">{{ $comment->post->title }}</h2>
                            <div class="flex items-center">
                                <p class="font-medium text-sm md:text-sm text-gray-400 me-2">{{ $comment->comment }}</p>
                                @php
                                    $dateComment = date_format($comment->created_at, 'M d');
                                @endphp
                                <p class="font-medium text-sm md:text-sm  text-gray-400" role="time">{{ $dateComment }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div id="tab2" class="tab-content">
                    @foreach ($user->posts as $post)
                        <div class="p-5 border-t">
                            <div class="flex items-center mb-2">
                                <div class="me-4">
                                    <a href="/users/{{ $post->user->name }}"><img alt="authProfile"
                                            src="{{ asset('images/no-image.jpg') }}" class=" w-8 rounded-full h-8" /></a>
                                </div>
                                <div>
                                    <p class="text-sm">{{ $post->user->name }}</p>
                                    @php
                                        $datePost = date_format($post->created_at, 'M d');
                                    @endphp
                                    <p role="time" class="text-xs">{{ $datePost }}</p>
                                </div>
                            </div>

                            <a href="/posts/{{ $post->id }}"
                                class="font-bold text-base md:text-2xl">{{ $post->title }}
                            </a>
                            <x-categories :categories="$post->categories" />
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
        <div></div>
    </div>
    <script>
        function showTab(tabId) {
            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(function(tabContent) {
                tabContent.classList.remove('active');
            });

            // Deactivate all tabs
            document.querySelectorAll('.tab').forEach(function(tab) {
                tab.classList.remove('active');
            });

            // Show the selected tab content
            document.getElementById(tabId).classList.add('active');

            // Activate the clicked tab
            document.querySelector('[onclick="showTab(\'' + tabId + '\')"]').classList.add('active');
        }
    </script>
@endsection
