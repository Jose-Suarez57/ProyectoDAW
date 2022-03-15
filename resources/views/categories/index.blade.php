
@extends('layout')

@section('content')

    <h2 style="text-align: center; margin-top: 15px">Post de {{$category->name}}</h2>

    @if(count($posts) == 0)
        <h3 style="text-align: center; margin-top: 100px">Aún no hay posts de esta categoría</h3>
    @endif

    @foreach($posts as $post)

        <div style="margin: 15px 0px" class="col-md-3">

            <a style="color: black; text-decoration: none" href="{{ url('/posts',$post->id)}}">

                <div style="box-shadow: 0px 4px 6px #ababab; border-radius: 4px; min-height: 514px; position: relative">

                    @if($post->image != '/storage/')

                        <img style="border-radius: 4px 4px 0px 0px" width="100%" height="250px" src="{{$post->image}}" alt="">

                    @endif

                    <div style="padding: 10px">

                        <h3 style="text-align: center; ">{{$post->title}}</h3>

                        <br>

                        <h6>Categoría: {{$post->category->name}}</h6>

                        <br>

                        <div style="display: flex">
                            Tags:
                            <ul>
                                @foreach(json_decode($post->tags, true) as $tag)

                                    <span style="border-radius: 3px; display: inline-block; padding: 5px; background-color: #dbdbdb; margin-bottom: 5px">{{$tag}}</span>

                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div style="background-color: #b3b3b3; padding: 5px; width: 100%; text-align: center; border-radius: 0px 0px 4px 4px; position: absolute; bottom: 0;">

                        Publicado por <span style="font-weight: bold">{{$post->blogger->name}}</span>

                    </div>

                </div>

            </a>


        </div>

    @endforeach

    {{ $posts->links() }}
@stop
