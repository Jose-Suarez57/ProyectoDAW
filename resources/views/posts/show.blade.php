
@extends('layout')

@section('content')

    <h1>{{$book->name}}</h1>

    <div style="margin-top: 20px" class="col-md-6">

        <img style="width: 50%; display:block; margin:auto;" src="{{$book->image}}" alt="{{$book->name}}">

    </div>

    <div style="margin-top: 20px" class="col-md-6">

        <strong>Categoría: </strong> {{$book->category->name}} <br><br>
        <strong>Autor/Autora: </strong> {{$book->author}} <br><br>
        <strong>Editorial: </strong> {{$book->publisher}}


        <br><br><br><br>

        @if(Auth::user() !== null)

            @if(Auth::user()->hasRole('admin'))

                <a href="{{ route('books.edit',$book->id) }}">
                    <button style="margin:auto;" class="btn btn-warning">Editar libro</button>
                </a>

                <br><br>
                <form onsubmit="window.confirm('¿Eliminar?')" action="{{ route('books.destroy',$book->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Eliminar libro</button>
                </form>

            @elseif($book->quantity == 0)

                <button disabled style="margin:auto;" class="btn btn-primary">Solicitar alquiler</button>
                <br><br>
                <p>Este libro no está disponible en este momento</p>

            @elseif($prestamosUsuario < 2)

                <a href="{{ route('prestamo', $book->id) }}">
                    <button style="margin:auto;" class="btn btn-primary">Solicitar alquiler</button>
                </a>
                <br><br>

            @else

                <button disabled style="margin:auto;" class="btn btn-primary">Solicitar alquiler</button>
                <br><br>
                <p>Este usuario tiene muchos prestamos solicitados o aceptados</p>

            @endif

        @endif

    </div>



@stop
