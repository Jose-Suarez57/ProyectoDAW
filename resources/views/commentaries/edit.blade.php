
@extends('layout')

@section('content')

    <h1>Edición de un comentario</h1>

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

        <form action="{{route('commentaries.update', $commentary->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="text" class="form-label"><strong>Contenido:</strong></label>
                <textarea class="form-control" name="text" id="text" cols="30" rows="5">{{$commentary->text}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
        <br>

        <a href="{{url('posts/'.$commentary->post->id)}}"><button class="btn btn-warning">Volver</button></a>



    </div>

@stop

