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

        <nav class="tw-flex tw-gap-7">
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
    </header>


    <div>
        @yield('content')
    </div>
</body>
</html>