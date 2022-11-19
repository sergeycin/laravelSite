@extends('layout')

@section('content')

<!-- <center>
<form enctype="multipart/form-data" style = "width : 25%; background-color: #ddd" action="/load" method="post">
    @csrf
    <p>Загрузите файл</p>
    <input type="file" name="message" id="">
    <br> <br>
    <input type="submit" value="Загрузить">
</form>
</center> -->
<center>
<section class="content container">
    <h2 class="mb-4">Загрузка постов для блога</h2>
    <form action="/load" method="post" enctype="multipart/form-data">
    @csrf
        <div class="input-group">
            <div class="custom-file">
                <input type="file" name="message" id="">
            </div>
            <div class="input-group-append">
                <button class="btn btn-outline-primary" type="submit" id="uploadInputBtn" style="color: limegreen; background-color: black; border-color: limegreen;">Загрузить посты</button>
            </div>
        </div>
    </form>
</section>
</center>
@endsection