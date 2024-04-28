<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <style>
        .material-symbols-outlined {
          font-variation-settings:
          'FILL' 0,
          'wght' 400,
          'GRAD' 0,
          'opsz' 24
        }
        </style>


</head>
<body class="tw-bg-gray-100">
    
    <header class="tw-flex tw-justify-between tw-py-6 tw-px-3 tw-items-center tw-border-b tw-border-solid tw-border-gray-300 tw-bg-white tw-shadow-sm">
        <a class="tw-text-2xl tw-font-semibold tw-text-gray-800 tw-flex" href="{{route('admin.home')}}">
            <img src="{{asset('assets/icon-clock.svg')}}" class="tw-w-10 tw-mr-2">
            Clock In Help
        </a>

        <nav class="tw-hidden md:tw-flex tw-gap-2 lg:tw-gap-4">
            <a href="{{route('admin.home')}}" class="tw-duration-200 tw-ease-in tw-text-md tw-text-gray-800 tw-font-semibold tw-rounded-md tw-px-2 tw-py-2 hover:tw-bg-blue-700 hover:tw-text-white tw-flex tw-items-center">
                <span class="material-symbols-outlined tw-mr-1">
                    home
                </span>
                Início
            </a>

            <a href="#" class="tw-duration-200 tw-ease-in tw-text-md tw-text-gray-800 tw-font-semibold tw-rounded-md tw-px-2 tw-py-2 hover:tw-bg-blue-700 hover:tw-text-white tw-flex tw-items-center">
                <span class="material-symbols-outlined tw-mr-1">
                    group
                </span>
                Funcionários
            </a>

            <a href="{{route('admin.timelines.index')}}" class="tw-duration-200 tw-ease-in tw-text-md tw-text-gray-800 tw-font-semibold tw-rounded-md tw-px-2 tw-py-2 hover:tw-bg-blue-700 hover:tw-text-white tw-flex tw-items-center">
                <span class="material-symbols-outlined tw-mr-1">
                    date_range
                </span>
                Timelines
            </a>

            <a href="#" class="tw-duration-200 tw-ease-in tw-text-md tw-text-gray-800 tw-font-semibold tw-rounded-md tw-px-2 tw-py-2 hover:tw-bg-blue-700 hover:tw-text-white tw-flex tw-items-center">
                <span class="material-symbols-outlined tw-mr-1">
                    lab_profile
                </span>
                Relatórios
            </a>

            <a href="{{route('logout')}}" class="tw-text-md tw-text-white tw-bg-blue-700 tw-font-semibold tw-rounded-3xl tw-px-3 tw-py-2 hover:tw-bg-blue-800 tw-flex tw-items-center">
                <span class="material-symbols-outlined tw-mr-1">
                    logout
                </span>
                Logout
            </a>
        </nav>

        <nav class="md:tw-hidden" x-data="{open: false}" @click.away="open=false">

            <button @click="open = !open">
                <svg x-show="!open" class="tw-w-9 tw-h-9" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
                <svg x-show="open" class="tw-w-9 tw-h-9" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" viewBox="0 0 24 24" stroke="currentColor"><path d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>

            <div x-show="open" x-transition:enter="tw-ease-out tw-duration-200" x-transition:enter-start="tw--right-24" x-transition:enter-end="tw-right-4" x-transition:leave="tw-ease-in tw-duration-200" x-transition:leave-start="tw-right-4" x-transition:leave-end="tw--right-24" id="menu-mobile" class="tw-flex tw-flex-col tw-absolute tw-bg-white tw-rounded-md tw-right-4 tw-translate-y-12 tw-items-end tw-shadow-md tw-justify-around tw-w-36">
                <a href="{{route('admin.home')}}" class="tw-duration-200 tw-ease-in tw-text-md tw-text-gray-800 tw-font-semibold tw-rounded-t-md tw-px-2 tw-py-4 tw-w-full hover:tw-bg-blue-700 hover:tw-text-white tw-flex tw-items-center">
                    <span class="material-symbols-outlined tw-mr-2">
                        home
                    </span>
                    Início
                </a>
    
                <a href="#" class="tw-duration-200 tw-ease-in tw-text-md tw-text-gray-800 tw-font-semibold tw-px-2 tw-py-4 tw-w-full hover:tw-bg-blue-700 hover:tw-text-white tw-flex tw-items-center">
                    <span class="material-symbols-outlined tw-mr-2">
                        group
                    </span>
                    Funcionários
                </a>

                <a href="{{route('admin.timelines.index')}}" class="tw-duration-200 tw-ease-in tw-text-md tw-text-gray-800 tw-font-semibold tw-px-2 tw-py-4 tw-w-full hover:tw-bg-blue-700 hover:tw-text-white tw-flex tw-items-center">
                    <span class="material-symbols-outlined tw-mr-2">
                        date_range
                    </span>
                    Timelines
                </a>
    
                <a href="#" class="tw-duration-200 tw-ease-in tw-text-md tw-text-gray-800 tw-font-semibold tw-px-2 tw-py-4 tw-w-full hover:tw-bg-blue-700 hover:tw-text-white tw-flex tw-items-center">
                    <span class="material-symbols-outlined tw-mr-2">
                        lab_profile
                    </span>
                    Relatórios
                </a>
    
                <a href="{{route('logout')}}" class="tw-duration-200 tw-ease-in tw-text-md tw-text-gray-800 tw-font-semibold tw-rounded-b-md tw-px-2 tw-py-4 tw-w-full hover:tw-bg-blue-700 hover:tw-text-white tw-flex tw-items-center">
                    <span class="material-symbols-outlined tw-mr-2">
                        logout
                    </span>
                    Logout
                </a>
            </div>
        </nav>
    </header>


    <div>
        @yield('content')
    </div>
</body>
</html>