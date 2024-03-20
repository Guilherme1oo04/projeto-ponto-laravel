<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')


</head>
<body class="tw-bg-white">
    
    <header class="tw-flex tw-justify-between tw-py-6 tw-px-5 tw-items-center tw-border-b tw-border-solid tw-border-slate-200 tw-shadow-sm">
        <a class="tw-text-2xl tw-font-semibold tw-text-slate-900 tw-flex" href="{{route('admin.home')}}">
            <img src="../../assets/icon-clock.svg" class="tw-w-10 tw-mr-2">
            Clock In Help
        </a>

        <nav class="tw-hidden sm:tw-flex tw-gap-6">
            <a href="{{route('admin.home')}}" class="tw-duration-200 tw-ease-in tw-text-md tw-text-slate-800 tw-font-semibold tw-rounded-sm tw-px-2 tw-py-1 hover:tw-bg-slate-700 hover:tw-text-slate-100">
                Home
            </a>

            <a href="#" class="tw-duration-200 tw-ease-in tw-text-md tw-text-slate-800 tw-font-semibold tw-rounded-sm tw-px-2 tw-py-1 hover:tw-bg-slate-700 hover:tw-text-slate-100">
                Funcionários
            </a>

            <a href="#" class="tw-duration-200 tw-ease-in tw-text-md tw-text-slate-800 tw-font-semibold tw-rounded-sm tw-px-2 tw-py-1 hover:tw-bg-slate-700 hover:tw-text-slate-100">
                Relatórios
            </a>

            <a href="{{route('logout')}}" class="tw-text-md tw-text-slate-100 tw-bg-slate-700 tw-font-semibold tw-rounded-2xl tw-px-3 tw-py-1 hover:tw-bg-slate-900 hover:tw-text-slate-50">
                Logout
            </a>
        </nav>

        <nav class="sm:tw-hidden">

            <button onclick="abrirMenu()" class="">
                <span id="barra-1" class="tw-w-[30px] tw-h-1 tw-bg-slate-900 tw-block tw-rounded tw-duration-200 tw-ease-in-out tw-mt-0"></span>
                <span id="barra-2" class="tw-w-[30px] tw-h-1 tw-bg-slate-900 tw-block tw-rounded tw-mt-1"></span>
                <span id="barra-3" class="tw-w-[30px] tw-h-1 tw-bg-slate-900 tw-block tw-rounded tw-duration-200 tw-ease-in-out tw-mt-1 "></span>
            </button>

            <div id="menu-mobile" class="tw-hidden tw-flex-col tw-absolute tw-bg-white tw-rounded-md tw-right-4 tw-translate-y-12 tw-items-end tw-shadow-md tw-justify-around tw-w-36">
                <a href="{{route('admin.home')}}" class="tw-duration-200 tw-ease-in tw-text-md tw-text-slate-800 tw-font-semibold tw-rounded-sm tw-px-2 tw-py-4 tw-w-full hover:tw-bg-slate-700 hover:tw-text-slate-100">
                    Home
                </a>
    
                <a href="#" class="tw-duration-200 tw-ease-in tw-text-md tw-text-slate-800 tw-font-semibold tw-rounded-sm tw-px-2 tw-py-4 tw-w-full hover:tw-bg-slate-700 hover:tw-text-slate-100">
                    Funcionários
                </a>
    
                <a href="#" class="tw-duration-200 tw-ease-in tw-text-md tw-text-slate-800 tw-font-semibold tw-rounded-sm tw-px-2 tw-py-4 tw-w-full hover:tw-bg-slate-700 hover:tw-text-slate-100">
                    Relatórios
                </a>
    
                <a href="{{route('logout')}}" class="tw-duration-200 tw-ease-in tw-text-md tw-text-slate-800 tw-font-semibold tw-rounded-sm tw-px-2 tw-py-4 tw-w-full hover:tw-bg-slate-700 hover:tw-text-slate-100">
                    Logout
                </a>
            </div>
        </nav>
    </header>


    <div>
        @yield('content')
    </div>

    <script>
        let menuOpen = false

        function abrirMenu() {

            let barra1 = document.getElementById('barra-1')
            let barra2 = document.getElementById('barra-2')
            let barra3 = document.getElementById('barra-3')
            
            let menu = document.getElementById('menu-mobile')

            if(menuOpen) {
                menu.classList.remove('tw-flex')
                menu.classList.add('tw-hidden')

                barra1.classList.remove('tw-rotate-45')
                barra1.classList.remove('tw-translate-y-[3.75px]')
                
                barra2.classList.remove('tw-hidden')

                barra3.classList.remove('tw--rotate-45')
                barra3.classList.remove('tw-translate-y-[-3.75px]')

            } else {
                menu.classList.remove('tw-hidden')
                menu.classList.add('tw-flex')

                barra1.classList.add('tw-rotate-45')
                barra1.classList.add('tw-translate-y-[3.75px]')
                
                barra2.classList.add('tw-hidden')

                barra3.classList.add('tw--rotate-45')
                barra3.classList.add('tw-translate-y-[-3.75px]')

            }
            menuOpen = !menuOpen
        }
    </script>
</body>
</html>