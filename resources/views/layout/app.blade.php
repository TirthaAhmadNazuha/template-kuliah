<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.sass')
  <title>@yield('title')</title>
</head>

<body>
  <div class="h-screen flex">
    @include('layout.sidenav')
    <div class="pl-8 pr-16 py-3 w-full">
      <header>
        <h1 class="text-[34px] mt-4 font-semibold">@yield('title')</h1>
      </header>
      <main class="flex-grow">
        @yield('content')
      </main>
    </div>
  </div>
  @vite('resources/js/app.js')
</body>

</html>
