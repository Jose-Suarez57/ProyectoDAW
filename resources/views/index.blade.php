
@extends('layout')

@section('content')

    <div style="margin-top: 15px" class="col-md-10 offset-md-1">

    @foreach($posts as $post)

        <a style="color: black; text-decoration: none" href="{{ url('/posts',$post->id)}}">

        <div style="border: double 2px grey">

            <div style="display: flex; justify-content: space-around">

                <h2>{{$post->title}}</h2>

                <span>{{$post->blogger->name}}</span>

            </div>

            <img width="350px" src="{{$post->image}}" alt="">

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

        </a>

        <br><br>

    @endforeach

    </div>

    {{ $posts->links() }}
@stop

