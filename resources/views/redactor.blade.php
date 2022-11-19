@extends('layout')


@section('content')
<center>
<h2 class="mb-4">Редактор блога</h2>
<form style = "width : 25%;" action="/redactor" method="post">
    @csrf
    <p>Тема</p>
    <input class="form-control" placeholder="Тема сообщения" type="text" name="theme" id="">
    <p>Заголовок</p>
    <input class="form-control" placeholder="Заголовок" type="text" name="name" id="">
    <p>Текст</p>
    <textarea class="form-control" placeholder="Какой-то важный или не очень важный текст" type="textarea" name="text" id=""></textarea>
    <br> <br>
    <input type="submit" style="color: limegreen; background-color: black;" value="Отправить">
</form>
</center>
@endsection