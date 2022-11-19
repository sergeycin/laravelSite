@extends('layout')

@section('content')
<div class="container">
    <center>
        <form action = "{{ route('register') }}" method = "POST">
            @csrf
            <p>Введите вашу почту</p>
            <input type="email" name = "email">
            <p>Введите ваш пароль</p>
            <input type="password" name = "password">
            <br> <br>
            <input type="submit" value="Войти">
        </form>
    </center> 
</div>
@endsection