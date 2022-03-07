<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    //Por get

    public function index()
    {
        $posts = Post::all();

        return view('index', compact('posts'));
    }

    //Por post

    public function buscar(Request $request)
    {

        $posts = Post::where('title',"like","%" .$request->title."%")->paginate(5);

        return view('index',compact("posts"));
    }
}
