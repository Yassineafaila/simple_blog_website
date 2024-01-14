<nav class="flex justify-between items-center mb-4 mt-4 py-4 px-4">
      <a href="/" class="font-bold text-xl sm:text-2xl">PureInsight</a>

      <ul class="flex space-x-6 sm:mr-6 text-lg">
        @auth
            <li>
                <span class="font-bold uppercase">
                    Welcome {{auth()->user()->name}}
                </span>
            </li>
            <li>
                <a href="/posts/myposts" class="hover:text-buttonBg">
                My posts</a>
            </li>
            <li>
                <form  class="inline" method="post" action="/logout">
                @csrf
            <button type="submit">
                <i class="fa-solid fa-door-closed"></i>Logout</button></form>
            </li>
            @else
             <li>
          <a href="/users/register" class="hover:text-laravel"
            ><i class="fa-solid fa-user-plus"></i> Register</a
          >
        </li>

        <li>
          <a href="/login" class="hover:text-laravel"
            ><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a
          >
        </li>
        @endauth

      </ul>
    </nav>
