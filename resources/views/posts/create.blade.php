
@extends('layout')

@section('content')

    <h1>Creación de un post</h1>

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

        <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Título:</label>
                <input type="text" class="form-control" name="title" id="title">
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Categoría (ID):</label>
                <select name="category_id" id="category_id">
                    <option value="0">-- Escoja su categoría --</option>
                    @foreach($categorias as $category)

                        <option value="{{$category->id}}">

                            {{$category->name }}

                            @if($category->adult == 1) +18 @endif

                        </option>

                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="text" class="form-label">Contenido</label>
                <textarea class="form-control" name="text" id="text" cols="30" rows="10"></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Imagen:</label>
                <input type="file" accept="image/*" class="form-control" name="image" id="image">
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Tags:</label>
                <select class="select" multiple>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                    <option value="4">Four</option>
                    <option value="5">Five</option>
                    <option value="6">Six</option>
                    <option value="7">Seven</option>
                    <option value="8">Eight</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="publisher" class="form-label">Editorial:</label>
                <input type="text" class="form-control" name="publisher" id="publisher">
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>

    </div>


@stop