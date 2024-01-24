@props(['categories'])
@php
    $categories = explode(',', $categories);
@endphp
<ul class="flex mt-3 flex-wrap">
    @foreach ($categories as $category)
        <li class="flex  items-center justify-center bg-red-500 hover:bg-red-700 hover:text-white transition duration-75 text-white rounded-xl mt-1 py-2 px-4 mr-2 text-xs md:text-sm">
            <a href="/?category={{ $category }}">{{ $category }}</a>
        </li>
    @endforeach
</ul>
