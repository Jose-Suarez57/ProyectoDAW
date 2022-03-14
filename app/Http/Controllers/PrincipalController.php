<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PrincipalController extends Controller
{
    //Por get

    public function index()
    {
        if(Auth::user() !== null && Auth::user()->age >= 18){

            $posts = Post::paginate(4);

        } else {

            $posts = Post::where('category_id', '!=', '3')->where('category_id', '!=', '5')->paginate(4);

        }

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
