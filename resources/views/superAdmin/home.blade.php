@extends('layouts.app')

@section('title', 'Admin Home')

@section('sidebar')
    @parent

    <li>Testando</li>

@endsection

@section('content')
    
    <h1>Vc é um super admin</h1>

    <a href="{{route('logout')}}">Logout</a>

@endsection