
@extends('layout')

@section('content')

    <h1 style="text-align: center; margin-top: 15px">{{$post->title}}</h1>

    <div style="margin-top: 10px; margin-bottom: 15px">

        <img style="max-width: 750px; width:100%; display:block; margin:auto;" src="{{$post->image}}" alt="">

    </div>

    <div style=" display: flex; justify-content: space-around; align-items: center; align-content: center">

        @if(@Auth::user() != null && (@Auth::user()->id == $post->blogger->id || @Auth::user()->hasRole('admin')))

        <ul style="list-style: none; margin-top: 12px; display: flex">

            @if(@Auth::user() != null && @Auth::user()->id == $post->blogger->id)

            <li style="margin-bottom: 35px; border-bottom: #7dff4c solid 2px; padding-bottom: 0px">

                <form action="{{url('/posts/'.$post->id.'/edit')}}" method="GET">
                    @csrf

                    <button type="submit" style="background: none; padding: 0px; border: none;">

                        <i style="color: green" class="fa-solid fa-pen-nib fa-xl"></i> Editar post

                    </button>

                </form>

            </li>

            @endif

            <li style="margin-bottom: 35px; border-bottom: #ff856a solid 2px; padding-bottom: 10px; margin-left: 20px">

                <form action="{{url('/posts/'.$post->id)}}" method="POST" onsubmit="return confirm('¿Seguro que quieres eliminar este post?')">
                    @csrf
                    @method('DELETE')

                    <button type="submit" style="background: none; padding: 0px; border: none;">

                        <i style="color: red" class="fa-solid fa-trash-can fa-xl"></i>

                        <span>Eliminar post</span>

                    </button>

                </form>

            </li>
        </ul>

        @endif

    </div>

    <p style="margin-top: 12.5px">{{$post->text}}</p>

    <br><br>

    @if(@Auth::user() !== null)

    <form action="{{url('/commentaries')}}" method="POST">
        @csrf

        <input type="text" id="{{$post->id}}" name="post_id" value="{{$post->id}}" hidden>

        <label for="text" style="font-weight: bold ">Escribe aquí tu comentario:</label>

        <br><br>

        <textarea name="text" id="text" cols="80" class="form-control" rows="3"></textarea>

        <br>

        <button type="submit" class="btn btn-outline-primary">Publicar comentario</button>

    </form>

    @endif


    <div style="margin-top: 20px">

        <h3>Comentarios</h3>

        <br>

        <ul class="list-group list-group-flush">
            @foreach($commentaries as $commentary)

                <li class="list-group-item" style="margin-bottom: 35px">

                    <div>

                        <div style="">

                            {{$commentary->text}}

                        </div>


                    </div>

                    <div style="display: flex; justify-content: space-between; margin-top: 10px">

                    <h5>{{$commentary->user->name}}</h5>

                        @if(@Auth::user() !== null && (@Auth::user()->id == $commentary->user->id || @Auth::user()->hasRole('admin')))

                            <ul style="list-style: none; margin-right: 35px; display: flex">

                                @if(@Auth::user() !== null && @Auth::user()->id == $commentary->user->id)

                                    <li style="margin-right: 25px">

                                        <form action="{{url('/commentaries/'.$commentary->id.'/edit')}}" method="GET">
                                            @csrf

                                            <button type="submit" style="background: none; padding: 0px; border: none">

                                                <i style="color: green" class="fa-solid fa-pen-nib"></i>

                                            </button>

                                        </form>

                                    </li>

                                @endif

                                <li style="">

                                    <form action="{{url('/commentaries/'.$commentary->id)}}" method="post" onsubmit="return confirm('¿Seguro que quieres eliminar este comentario?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" style="background: none; padding: 0px; border: none">

                                            <i style="color: red" class="fa-solid fa-trash-can"></i>

                                        </button>

                                    </form>

                                </li>

                            </ul>

                        @endif

                    </div>


                </li>

            @endforeach


        </ul>



    </div>

    {{ $commentaries->links() }}


@stop
