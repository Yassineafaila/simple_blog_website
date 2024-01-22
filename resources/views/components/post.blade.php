@props(["post"])
    <div class="rounded">
          <div class="">
            <img class="w-full md:block h-96" src="{{$post->cover ? asset("storage/".$post->cover) : asset("/images/post.png")}}" alt="" />
            <div>
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
                  <span class="ms-4 font-bold">{{$post->user->name}}</span>
                </div>
                @php
                    $date=date_format($post->created_at,"M,d Y");
                @endphp
                <div class="font-bold">{{$date}}</div>
              </div>
              {{-- ----component-categories--- --}}
              <x-categories :categories="$post->categories"/>
              <div class="text-lg mt-4"></div>
            </div>
          </div>
        </div>
