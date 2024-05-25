<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="tw-bg-gray-100">
    
    <header class="tw-flex tw-justify-between tw-py-6 tw-px-3 tw-items-center tw-border-b tw-border-solid tw-border-gray-300 tw-bg-white tw-shadow-sm tw-overflow-x-hidden">
        <a class="tw-text-xl lg:tw-text-2xl tw-font-semibold tw-text-gray-800 tw-flex tw-items-center" href="{{route('admin.home')}}">
            <img src="{{asset('assets/icon-clock.svg')}}" class="tw-w-10 tw-mr-2">
            Clock In Help
        </a>

        <nav class="tw-hidden md:tw-flex sm:tw-gap-1 lg:tw-gap-4">
            <a href="{{route('admin.home')}}" class="tw-duration-200 tw-ease-in tw-text-md tw-text-gray-800 tw-font-semibold tw-rounded-md tw-px-2 tw-py-2 hover:tw-bg-blue-700 hover:tw-text-white tw-flex tw-items-center">
                <svg data-slot="icon" class="tw-w-6 tw-mr-1" fill="none" stroke-width="1.9" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"></path>
                </svg>

                Início
            </a>

            <a href="{{route('admin.employees.index')}}" class="tw-duration-200 tw-ease-in tw-text-md tw-text-gray-800 tw-font-semibold tw-rounded-md tw-px-2 tw-py-2 hover:tw-bg-blue-700 hover:tw-text-white tw-flex tw-items-center">
                <svg data-slot="icon" class="tw-w-6 tw-mr-1" fill="none" stroke-width="1.9" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"></path>
                </svg>

                Funcionários
            </a>

            <a href="{{route('admin.timelines.index')}}" class="tw-duration-200 tw-ease-in tw-text-md tw-text-gray-800 tw-font-semibold tw-rounded-md tw-px-2 tw-py-2 hover:tw-bg-blue-700 hover:tw-text-white tw-flex tw-items-center">
                <svg data-slot="icon" class="tw-w-6 tw-mr-1" fill="none" stroke-width="1.9" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z"></path>
                </svg>

                Timelines
            </a>

            <a href="#" class="tw-duration-200 tw-ease-in tw-text-md tw-text-gray-800 tw-font-semibold tw-rounded-md tw-px-2 tw-py-2 hover:tw-bg-blue-700 hover:tw-text-white tw-flex tw-items-center">
                <svg data-slot="icon" class="tw-w-6 tw-mr-1" fill="none" stroke-width="1.9" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75"></path>
                </svg>

                Relatórios
            </a>

            <a href="{{route('logout')}}" class="tw-text-md tw-text-white tw-bg-blue-700 tw-font-semibold tw-rounded-3xl tw-px-3 tw-py-2 hover:tw-bg-blue-800 tw-flex tw-items-center">
                <svg data-slot="icon" class="tw-w-6 tw-mr-1" fill="none" stroke-width="1.9" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9"></path>
                </svg>

                Logout
            </a>
        </nav>

        <nav class="md:tw-hidden tw-flex tw-flex-col tw-items-end" x-data="{open: false}" @click.away="open=false">

            <button @click="open = !open">
                <svg x-show="!open" class="tw-w-9 tw-h-9" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
                <svg x-show="open" class="tw-w-9 tw-h-9" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" viewBox="0 0 24 24" stroke="currentColor"><path d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>

            <div x-show="open" x-transition:enter="tw-ease-out tw-duration-200" x-transition:enter-start="tw--translate-x-20" x-transition:enter-end="tw-translate-x-0" x-transition:leave="tw-ease-in tw-duration-200" x-transition:leave-start="tw-translate-x-0" x-transition:leave-end="tw-translate-x-20" id="menu-mobile" class="tw-flex tw-flex-col tw-absolute tw-bg-white tw-rounded-md tw-translate-y-20 tw-items-end tw-shadow-md tw-justify-around tw-w-36">
                <a href="{{route('admin.home')}}" class="tw-duration-200 tw-ease-in tw-text-md tw-text-gray-800 tw-font-semibold tw-rounded-t-md tw-px-2 tw-py-4 tw-w-full hover:tw-bg-blue-700 hover:tw-text-white tw-flex tw-items-center">
                    <svg data-slot="icon" class="tw-w-6 tw-mr-2" fill="none" stroke-width="1.9" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"></path>
                    </svg>
                    
                    Início
                </a>
    
                <a href="{{route('admin.employees.index')}}" class="tw-duration-200 tw-ease-in tw-text-md tw-text-gray-800 tw-font-semibold tw-px-2 tw-py-4 tw-w-full hover:tw-bg-blue-700 hover:tw-text-white tw-flex tw-items-center">
                    <svg data-slot="icon" class="tw-w-6 tw-mr-2" fill="none" stroke-width="1.9" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"></path>
                    </svg>

                    Funcionários
                </a>

                <a href="{{route('admin.timelines.index')}}" class="tw-duration-200 tw-ease-in tw-text-md tw-text-gray-800 tw-font-semibold tw-px-2 tw-py-4 tw-w-full hover:tw-bg-blue-700 hover:tw-text-white tw-flex tw-items-center">
                    <svg data-slot="icon" class="tw-w-6 tw-mr-2" fill="none" stroke-width="1.9" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z"></path>
                    </svg>

                    Timelines
                </a>
    
                <a href="#" class="tw-duration-200 tw-ease-in tw-text-md tw-text-gray-800 tw-font-semibold tw-px-2 tw-py-4 tw-w-full hover:tw-bg-blue-700 hover:tw-text-white tw-flex tw-items-center">
                    <svg data-slot="icon" class="tw-w-6 tw-mr-2" fill="none" stroke-width="1.9" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75"></path>
                    </svg>
                    Relatórios
                </a>
    
                <a href="{{route('logout')}}" class="tw-duration-200 tw-ease-in tw-text-md tw-text-gray-800 tw-font-semibold tw-rounded-b-md tw-px-2 tw-py-4 tw-w-full hover:tw-bg-blue-700 hover:tw-text-white tw-flex tw-items-center">
                    <svg data-slot="icon" class="tw-w-6 tw-mr-2" fill="none" stroke-width="1.9" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9"></path>
                    </svg>

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