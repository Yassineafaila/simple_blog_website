@props(['categories'])
@php
    $categories=explode(",",$categories)
@endphp
<ul class="flex mt-3">
    @foreach ($categories as $category)
            <li class="flex  items-center justify-center bg-black text-white rounded-xl py-2 px-4 mr-2 text-xs">
                <a href="/?category={{$category}}">{{$category}}</a>
            </li>
    @endforeach
</ul>
