
@extends('layout')

@section('content')

    @foreach($posts as $post)

        <div style="margin-top: 15px" class="col-md-3">

            <a style="color: black; text-decoration: none" href="{{ url('/posts',$post->id)}}">

                <div style="box-shadow: 0px 4px 6px #ababab; border-radius: 4px">

                    <img style="border-radius: 4px 4px 0px 0px" width="100%" height="250px" src="{{$post->image}}" alt="">

                    <div style="padding: 10px">

                        <h3 style="text-align: center; ">{{$post->title}}</h3>

                        <br>

                        <h6>Categoría: {{$post->category->name}}</h6>

                        <br>

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


        </div>

    @endforeach

    {{ $posts->links() }}
@stop

