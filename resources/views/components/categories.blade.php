@props(['categories'])
@php
    $categories = explode(',', $categories);
@endphp
<ul class="flex mt-3 flex-wrap">
    @foreach ($categories as $category)
        <li class="flex  items-center justify-center bg-gray-200 hover:bg-gray-500 hover:text-white transition duration-75 text-black rounded-xl mt-1 py-2 px-4 mr-2 text-xs">
            <a href="/?category={{ $category }}">{{ $category }}</a>
        </li>
    @endforeach
</ul>
