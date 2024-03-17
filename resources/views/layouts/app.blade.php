<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')

    <!--Icon "X"-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!--Icon Menu-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

</head>
<body class="tw-bg-white">
    
    <div class="tw-min-h-screen tw-w-screen tw-max-w-md tw-bg-white tw-absolute tw-translate-x-[-470px] tw-duration-300 tw-ease-in-out tw-shadow-gray-700 tw-shadow-xl" id="menu">

        <button onclick="menu()" class="tw-p-2 tw-fixed tw-ml-[400px]">
            <span class="material-symbols-outlined tw-text-slate-500 tw-text-2xl tw-font-semibold">
                close
            </span>
        </button>

        <ul>
            @section('sidebar')
                <li>opa</li>
                <li>opa</li>
                <li>opa</li>
                <li>opa</li>
                <li>opa</li>
            @show
        </ul>

    </div>

    <div class="tw-w-full tw-h-full">

        <div>
            <button>
                <span class="material-symbols-outlined tw-text-slate-500 tw-text-2xl tw-font-semibold" onclick="menu()">
                    menu
                </span>
            </button>

            <h1>Clock In Help</h1>
        </div>

        @yield('content')

    </div>

    <script>
        let menuOpen = false

        function menu() {
            let menu = document.getElementById('menu')

            if (menuOpen) {
                menu.classList.add('tw-translate-x-[-470px]')
            } else {
                menu.classList.remove('tw-translate-x-[-470px]')
            }

            menuOpen = !menuOpen
        }
    </script>

</body>
</html>