@php
  $routes = [
    ['/', 'Beranda'],
    ['/test-items', 'Test Item']
  ]
@endphp

<aside
  class="bg-slate-800 rounded-r-[16px] text-white flex flex-col font-medium px-6 py-4 min-w-[240px] max-w-full text-lg h-full">
  <h1 class="font-semibold text-[28px] pb-3 border-b-slate-400 my-6 border-b-2">Logo</h1>
  <div class="flex flex-col gap-3 flex-grow">
    @foreach ($routes as $route)
    <a class="hover:bg-slate-700 px-3 py-2 rounded-md" href="{{$route[0]}}">{{$route[1]}}</a>
  @endforeach
    @if (isset(auth()->user()->name))
    <button class="mt-auto bg-slate-900 px-3 py-2 rounded-md relative" toggle="logout_show">
      {{ auth()->user()->name }}
      <a href="/logout" toggle-effect="logout_show"
      class="aria-selected:block hidden absolute bottom-[calc(100%+12px)] left-0 w-full py-2 px-3 rounded-md bg-gray-50 text-black">
      Logout
      </a>
    </button>
  @endif
  </div>
</aside>
