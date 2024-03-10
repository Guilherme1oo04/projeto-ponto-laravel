<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite('resources/css/app.css')
    @vite('resources/css/login.css')

</head>
<body>
    
    <div class="screen">

        <h1 class="title">Clock In Help</h1>

        <form action="{{route('auth.authenticate')}}" method="post" class="">
            @csrf
        
            <div class="inputs">
                <input type="text" id="email" name="email" class="input" placeholder=" ">
                <label for="email" class="input-label">
                    Email
                </label>
            </div>
            <div class="inputs">
                <input type="password" id="password" name="password" class="input" placeholder=" ">
                <label for="password" class="input-label">
                    Password
                </label>
            </div>
        
            <input type="submit" value="Login">
        </form>
        
        @if (session('message'))
            <div>{{ session('message') }}</div>
        @endif
    </div>


</body>
</html>
