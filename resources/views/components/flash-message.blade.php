<div x-data="{open:true}" x-init="setTimeout(()=>open=false,2000)" x-show="open" class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-48 py-3">
    {{$slot}}
</div>

