
@extends('layout')

@section('content')

Inicio <br><br>

@if(@Auth::user() !== null)

    @if(@Auth::user()->hasRole("admin"))

        Administrador

    @elseif(@Auth::user()->hasRole("blogger"))

        Bloguero

    @endif

@else

    Sin registrar

@endif

    @foreach($posts as $post)

        {{$post->title}}

    @endforeach

    <br>Fin

@stop

