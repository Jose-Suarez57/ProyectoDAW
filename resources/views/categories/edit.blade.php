
@extends('layout')

@section('content')

    <h1>{{$book->name}}</h1> <br>

    <h1>Edición de un libro</h1>

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

        <form action="{{route('books.update', $book->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nombre:</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$book->name}}">
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Categoría (ID):</label>
                <input type="number" class="form-control" name="category_id" id="category_id" value="{{$book->category_id}}">
            </div>
            <div class="mb-3">
                <label for="isbn" class="form-label">Isbn:</label>
                <input type="number" class="form-control" name="isbn" id="isbn" value="{{$book->isbn}}">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">URL de la imagen:</label>
                <input type="text" class="form-control" name="image" id="image" value="{{$book->image}}">
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Autor:</label>
                <input type="text" class="form-control" name="author" id="author" value="{{$book->author}}">
            </div>
            <div class="mb-3">
                <label for="publisher" class="form-label">Editorial:</label>
                <input type="text" class="form-control" name="publisher" id="publisher" value="{{$book->publisher}}">
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>

    </div>

@stop
