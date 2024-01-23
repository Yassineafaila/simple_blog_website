@props(["post"])
    <div class="rounded-md bg-white border">
          <div class="">
            <img class="w-full md:block h-96" src="{{$post->cover ? asset("storage/".$post->cover) : asset("/images/post.png")}}" alt="" />
            <div class="px-2">
              <div
                class="flex w-full justify-between items-center font-bold text-xl mt-3 mb-1.5"
              >
                <a href="/posts/{{$post->id}}" class="text-lg"
                  >{{$post->title}}
                </a>
              </div>
              <div class="text-base text-gray-400 mb-3">
                {{$post->description}}
              </div>
              <div class="flex items-center w-full justify-between">
                <div class="flex items-center">
                  <img
                    alt="authProfile"
                    src="{{ $post->user->avatar ? asset('storage/' . $post->user->avatar) : asset('/images/no-image.jpg') }}"
                    class="w-10 rounded-full h-10"
                  />
                  <a href="/users/{{$post->user->name}}" class="ms-4 font-bold">{{$post->user->name}}</a>
                </div>
                @php
                    $date=date_format($post->created_at,"M,d Y");
                @endphp
                <div class="font-bold text-gray-400 text-sm">{{$date}}</div>
              </div>
              {{-- ----component-categories--- --}}
              <x-categories :categories="$post->categories"/>
              <div class="text-lg mt-4"></div>
            </div>
          </div>
        </div>
