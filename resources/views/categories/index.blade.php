
@extends('layout')

@section('content')

    @if(count($posts) == 0)
        <h2 style="text-align: center">Aún no hay posts de esta categoría</h2>
    @endif

    @foreach($posts as $post)

        <div style="margin-top: 15px" class="col-md-4">

            <a style="color: black; text-decoration: none" href="{{ url('/posts',$post->id)}}">

                <div style="box-shadow: 0px 4px 6px #ababab; border-radius: 4px">

                    <img style="border-radius: 4px 4px 0px 0px" width="100%" src="{{$post->image}}" alt="">

                    <div style="padding: 10px">

                        <h3 style="text-align: center; ">{{$post->title}}</h3>

                        <br><br>

                        <h5>Categoría: {{$post->category->name}}</h5>

                        <br><br>

                        <div style="display: flex">
                            Tags:
                            <ul>
                                @foreach(json_decode($post->tags, true) as $tags)

                                    <span style="padding: 5px; background-color: #dbdbdb">{{$tags}}</span>

                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div style="background-color: #b3b3b3; padding: 5px; text-align: center; border-radius: 0px 0px 4px 4px">

                        Publicado por <span style="font-weight: bold">{{$post->blogger->name}}</span>

                    </div>

                </div>

            </a>

            <br><br>

        </div>

    @endforeach

    {{ $posts->links() }}
@stop
