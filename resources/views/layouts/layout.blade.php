<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- ---cdn-font-awesome-- -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    {{-- ---alpine-js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="css/app.css" />
    {{-- --tailwind--- --}}
        @vite('resources/css/app.css')
    <title>Blog</title>
  </head>
  <body class="mb-48">
    @if (session()->has("message"))
        <x-flash-message>
            <p>{{session("message")}}</p>
        </x-flash-message>
    @endif
    {{-- ----header--- --}}
    @include("partials._header")
    <main>
        @yield('content')
    </main>
    {{-- ----footer--- --}}
    @include("partials._footer")

    <script src="resources/js/app.js"></script>
  </body>
</html>>
