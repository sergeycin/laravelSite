@extends('layout')

@section('content')
<div class="container">
    @for($i=0; $i<count($blogs); $i++)
    <center>
        <div style = "margin-top: 20px; background-color: #ddd; width: 75%; color: black; ">
            <p style="text-align: left;" id = "name{{ $i }}">Название: {{ $blogs[$i]->name }}</p>
            <p style="text-align: left;" id = "name{{ $i }}">Тема: {{ $blogs[$i]->theme }}</p>
            <p style="text-align: left;" id = "text{{ $i }}">Сообщение: "{{ $blogs[$i]->text }}"</p>
            <p style="text-align: left;" id = "auth{{ $i }}">Автор: {{ auth()->user()->email }} </p>
            <small style="text-align: left;">Published: {{ $blogs[$i]->data }} </small>
            <br><br>    
        </div>
    </center>
    @endfor
    <center>
        @for($j = 1; $j<=$countPages; $j++)
            <a style="color: limegreen!important;" href = "/myblog/{{ $j }}">{{ $j  }}</a>
        @endfor
    </center>
</div>

@endsection