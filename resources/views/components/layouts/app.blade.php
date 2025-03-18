<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Page Title' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet"/>

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body>


<div class="navbar bg-base-200 shadow-sm">
    <div class="flex-1">
        <a class="btn btn-ghost text-xl">daisyUI</a>
    </div>
    <div class="flex-none">
        <ul class="menu menu-horizontal px-1">
            <li><a>Link</a></li>
            <li>
                <details>
                    <summary>Parent</summary>
                    <ul class="bg-base-100 rounded-t-none p-2">
                        <li><a>Link 1</a></li>
                        <li><a>Link 2</a></li>
                    </ul>
                </details>
            </li>
        </ul>
    </div>
</div>

<main class='flex bg-base-200  '>
    {{-------Sidebar------}}
    <ul class="menu bg-base-200  w-56 hidden sm:block h-screen">
        <li>
            <h2 class="menu-title">Title</h2>
            <ul>
                <li>
                    <a href="/"
                       class="{{ request()->is('/') ? 'menu-active' : '' }}">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{route('product.page')}}"
                       class="{{ request()->routeIs('product.page') ? 'menu-active' : '' }}">
                        Product
                    </a>
                </li>
                <li><a>Item 3</a></li>
            </ul>
        </li>
    </ul>
    {{-------------}}

    <div class='container '>
        <div class="p-2 sm:p-4 bg-base-100 rounded-xl mb-32">
            {{ $slot }}
        </div>
    </div>
    <div class="sm:hidden block">

        <div class="dock dock-md  bg-base-200">

            <a href="/" class="{{ request()->is('/') ? 'dock-active' : '' }}">
                <svg class="size-[1.2em]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <g fill="currentColor" stroke-linejoin="miter" stroke-linecap="butt">
                        <polyline points="1 11 12 2 23 11" fill="none" stroke="currentColor" stroke-miterlimit="10"
                                  stroke-width="2"></polyline>
                        <path d="m5,13v7c0,1.105.895,2,2,2h10c1.105,0,2-.895,2-2v-7" fill="none" stroke="currentColor"
                              stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></path>
                        <line x1="12" y1="22" x2="12" y2="18" fill="none" stroke="currentColor" stroke-linecap="square"
                              stroke-miterlimit="10" stroke-width="2"></line>
                    </g>
                </svg>
                <span class="dock-label">Home</span>
            </a>
            <a href="{{route('product.page')}}" class="{{ request()->routeIs('product.page') ? 'dock-active' : '' }}">
                <svg class="size-[1.2em]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <g fill="currentColor" stroke-linejoin="miter" stroke-linecap="butt">
                        <polyline points="3 14 9 14 9 17 15 17 15 14 21 14" fill="none" stroke="currentColor"
                                  stroke-miterlimit="10" stroke-width="2"></polyline>
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2" fill="none" stroke="currentColor"
                              stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></rect>
                    </g>
                </svg>
                <span class="dock-label">Inbox</span>
            </a>

            <button>
                <svg class="size-[1.2em]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <g fill="currentColor" stroke-linejoin="miter" stroke-linecap="butt">
                        <circle cx="12" cy="12" r="3" fill="none" stroke="currentColor" stroke-linecap="square"
                                stroke-miterlimit="10" stroke-width="2"></circle>
                        <path
                            d="m22,13.25v-2.5l-2.318-.966c-.167-.581-.395-1.135-.682-1.654l.954-2.318-1.768-1.768-2.318.954c-.518-.287-1.073-.515-1.654-.682l-.966-2.318h-2.5l-.966,2.318c-.581.167-1.135.395-1.654.682l-2.318-.954-1.768,1.768.954,2.318c-.287.518-.515,1.073-.682,1.654l-2.318.966v2.5l2.318.966c.167.581.395,1.135.682,1.654l-.954,2.318,1.768,1.768,2.318-.954c.518.287,1.073.515,1.654.682l.966,2.318h2.5l.966-2.318c.581-.167,1.135-.395,1.654-.682l2.318.954,1.768-1.768-.954-2.318c.287-.518.515-1.073.682-1.654l2.318-.966Z"
                            fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10"
                            stroke-width="2"></path>
                    </g>
                </svg>
                <span class="dock-label">Settings</span>
            </button>
        </div>
    </div>

</main>

</body>
</html>
