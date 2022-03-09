
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
                <label for="tags" class="form-label">Tags (Ctrl + click en todas las tags que quieras usar):</label> <br>
                <select multiple id="tags" name="tags[]" class="form-select">
                    <optgroup label="Informática">
                        <option value="Programación">Programación</option>
                        <option value="Hardware">Hardware</option>
                        <option value="Ciberseguridad">Ciberseguridad</option>
                    </optgroup>
                    <optgroup label="Cocina">
                        <option value="Postres">Postres</option>
                        <option value="Cocina vegana">Cocina vegana</option>
                        <option value="Recetas rápidas">Recetas rápidas</option>
                    </optgroup>
                    <optgroup label="Criptomonedas">
                        <option value="Subidas y bajadas">Subidas y bajadas</option>
                        <option value="Bitcoin">Bitcoin</option>
                        <option value="Ethereum">Ethereum</option>
                    </optgroup>
                    <optgroup label="Cine y series">
                        <option value="Terror">Terror</option>
                        <option value="Aventuras">Aventuras</option>
                        <option value="Crítica y opinión">Crítica y opinión</option>
                    </optgroup>
                    <optgroup label="Apuestas">
                        <option value="Futbolísticas">Futbolísticas</option>
                        <option value="Caballos">Caballos</option>
                        <option value="Casino">Casino</option>
                    </optgroup>
                    <optgroup label="Deportes">
                        <option value="Futbol">Futbol</option>
                        <option value="Motor">Motor</option>
                        <option value="Deportes de contacto">Deportes de contacto</option>
                    </optgroup>
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
