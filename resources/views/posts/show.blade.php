
@extends('layout')

@section('content')

    <div style="margin-top: 10px; margin-bottom: 15px">

        <img style="max-width: 750px; width:100%; display:block; margin:auto;" src="{{$post->image}}" alt="">

    </div>


    <h2>{{$post->title}}</h2>

    <br>

    <p>{{$post->text}}</p>

    <br><br>

    <form action="{{url('/commentaries')}}" method="POST">
        @csrf

        <input type="text" id="{{$post->id}}" name="post_id" value="{{$post->id}}" hidden>

        <label for="text" style="font-weight: bold ">Escribe aquí tu comentario:</label>

        <br><br>

        <textarea name="text" id="text" cols="80" class="form-control" rows="5"></textarea>

        <br>

        <button type="submit" class="btn btn-outline-primary">Publicar comentario</button>

    </form>

    <br><br>

    <div>

        <h3>Comentarios</h3>

        <br>

        @foreach($commentaries as $commentary)

            {{$commentary->text}}

        @endforeach

    </div>


@stop
