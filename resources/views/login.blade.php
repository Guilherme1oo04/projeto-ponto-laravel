<form action="{{route('auth.authenticate')}}" method="post">
    @csrf

    <label for="email">Email</label>
    <input type="text" id="email" name="email">
    <br>
    <label for="password">Password</label>
    <input type="password" id="password" name="password">
    <br>
    <input type="submit" value="Login">
</form>

@if (session('message'))
    <div>{{ session('message') }}</div>
@endif