@extends('layout')

@section('content')
<center>
    @auth
<p style = "font-size: 50px">Привет, Пользователь!</p>
</center>
@endauth
@endsection