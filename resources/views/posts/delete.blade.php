
@extends('layout')

@section('content')

    <h1>¿Estás seguro de que quieres eliminar {{$book->name}}?</h1>

    <div class="col-md-10 offset-md-1">

        <br>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Tienes un error en los datos</strong><br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <br>

        <form action="{{route('books.destroy'.$book->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-primary">Si</button>
            <a href="/">
                <button type="submit" class="btn btn-primary">No</button>
            </a>


        </form>

    </div>

@stop
