<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://unpkg.com/flowbite@1.3.3/dist/flowbite.js"></script>
    {{-- <script src="../path/to/flowbite/dist/flowbite.js"></script> --}}
</head>
<body class="font-Poppins">
    <div id="app">
        <header>
            <nav class="container flex items-center py-4 mt-4 sm:mt-8">
                <div class="py-1">image</div>
                <ul class="hidden sm:flex flex-1 justify-end items-center gap-9 uppercase text-xs">
                    <li class="cursor-pointer">
                        <router-link to="/home">Home</router-link>
                    </li>
                    <li class="cursor-pointer">
                        <router-link to="/about">About</router-link>
                    </li>
                    <li class="cursor-pointer ">
                        <a href="/employees-index">Employee</a>
                    </li>

                    @guest
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}" type="button" class="bg-cyan-900 text-white rounded-md px-7 py-3 uppercase transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-cyan-500 duration-300 ">Login</a>
                        @endif

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" type="button" class="bg-cyan-900 text-white rounded-md px-7 py-3 uppercase transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-cyan-500 duration-300 ">Register</a>
                        @endif
                    @else

                    <button id="dropdownButton" data-dropdown-toggle="dropdown" class="text-white bg-cyan-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Hi, {{ Auth::user()->name }}!<svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>

                    <div id="dropdown" class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                        <ul class="py-1" aria-labelledby="dropdownButton">
                            <li>
                                <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>

                    @endguest                    
                    
                </ul>
                <div class="flex sm:hidden flex-1 justify-end">
                    <i class="text-xl fas fa-bars"></i>
                </div>
            </nav>
        </header>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
