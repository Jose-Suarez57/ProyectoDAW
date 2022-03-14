
@extends('layout')

@section('content')

    <h1>Edición de un usuario
    </h1>

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

        <form action="{{route('users.update', $user->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label"><strong>Nombre:</strong></label>
                <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
            </div>
            <div class="mb-3">
                <label for="age" class="form-label"><strong>Edad:</strong></label>
                <input type="number" class="form-control" name="age" id="age" value="{{$user->age}}">
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>

    </div>

@stop
