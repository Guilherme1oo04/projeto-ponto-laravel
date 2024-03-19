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
    
    <header>
        <h1>Clock In Help</h1>
    </header>


    <div>
        @yield('content')
    </div>
</body>
</html>