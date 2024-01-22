<nav class="flex justify-between items-center mb-4 mt-4 py-4 px-4 md:px-0 lg:container mx-auto relative">
    <div class="flex items-center">
        <a href="/"
            class="font-bold text-base sm:text-2xl bg-black py-1.5 px-2.5 rounded-md text-white">PureInsight</a>
        <form action="/" class="hidden md:flex md:w-96 ">
            <div class="relative border-2 border-gray-100 m-4 rounded-lg flex items-center">

                <input type="text" name="search" class="h-10 w-full py-1.5 px-2 focus:outline-none "
                    placeholder="Search" />
                <button type="submit" class="h-10 w-10 text-white ">
                    <i class="fa fa-search text-black  hover:text-gray-500"></i>
                </button>
            </div>
        </form>
    </div>
    <ul class="flex space-x-6 sm:mr-6 text-lg items-center ">
        @auth

            <li class="hidden md:block">
                <a href="/posts/create"
                    class="border  border-red-500 text-red-500 text-base p-2 ms-2 rounded hover:bg-buttonBg hover:text-white hover:underline font-bold">Create
                    Post</a>
            </li>
            <li class="">
                <button type="button"
                    class="showMenuButton hover:outline hover:outline-1  hover:outline-red-500 rounded-full">
                    <img src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : asset('/images/no-image.jpg') }}"
                        alt="{{ auth()->user()->name }}" class="w-10 h-10 rounded-full">
                </button>

                <ul
                    class=" subMenu p-1  top-24 flex-col sm:w-60 left-0 sm:left-3/4 sm:top-20  container rounded-md bg-white border border-gray-300">
                    <li class="border-b   border-gray-300 py-3  "><a href="/users/{{ auth()->user()->name }}"
                            class="block py-1.5 text-base hover:bg-red-200 hover:text-red-600 hover:underline rounded-md px-6">{{ auth()->user()->name }}</a>
                    </li>
                    <li class="border-b border-gray-300 py-3 ">
                        <div class="flex flex-col gap-2">
                            <a href="/posts/create"
                                class="text-base hover:bg-red-200 hover:text-red-600 hover:underline rounded-md px-6 py-1.5">Create
                                Post</a>
                            <a href="/posts/myposts"
                                class="text-base hover:bg-red-200 hover:text-red-600 hover:underline rounded-md px-6 py-1.5">My
                                posts</a>
                            <a href="/posts/saves"
                                class="text-base hover:bg-red-200 hover:text-red-600 hover:underline rounded-md px-6 py-1.5">Saved
                                Posts</a>
                            <a href="/settings"
                                class="text-base hover:bg-red-200 hover:text-red-600 hover:underline rounded-md px-6 py-1.5">Settings</a>
                        </div>
                    </li>
                    <li class="py-3">
                        <form class="flex" method="post" action="/logout">
                            @csrf
                            <button type="submit"
                                class="text-base hover:bg-red-200 w-full text-start hover:text-red-600 hover:underline rounded-md px-6 py-1.5">
                                <i class="fa-solid fa-door-closed"></i>Logout</button>
                        </form>
                    </li>
                </ul>
            </li>
        @else
            <li>
                <a href="/users/register" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i> Register</a>
            </li>

            <li>
                <a href="/login" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a>
            </li>
        @endauth
    </ul>
    <script>
        $(document).ready(function() {
            $(".showMenuButton").on("click", function() {
                $(".subMenu").toggleClass("show");
            })
        });
    </script>
</nav>
