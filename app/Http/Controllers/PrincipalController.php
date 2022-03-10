<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    //Por get

    public function index()
    {
        $posts = Post::paginate(4);

        $categories = Category::all();

        return view('index', compact('posts', 'categories'));
    }

    //Por post

    public function buscar(Request $request)
    {

        $posts = Post::where('title',"like","%" .$request->title."%")->paginate(4);

        return view('index',compact("posts"));
    }
}
