<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PrincipalController extends Controller
{
    //Por get

    public function index()
    {
        $usuarios = User::whereRaw('banned = 0')->get();
        $ids = [];

        foreach($usuarios as $usuario){
            array_push($ids, $usuario->id);
        }

        if(Auth::user() !== null && Auth::user()->age >= 18){
            $posts = Post::whereIn('blogger_id', $ids)->paginate(4);
        } else {
            $posts = Post::where('category_id', '!=', '3')->where('category_id', '!=', '5')->whereIn('blogger_id', $ids)->paginate(4);
        }

        $categories = Category::all();
        return view('index', compact('posts', 'categories'));
    }

    //Por post

    public function buscar(Request $request)
    {

        $usuarios = User::whereRaw('banned = 0')->get();

        $ids = [];

        foreach($usuarios as $usuario){

            array_push($ids, $usuario->id);

        }

        if(Auth::user() !== null && Auth::user()->age >= 18){

            $posts = Post::where('title',"like","%" .$request->title."%")->whereIn('blogger_id', $ids)->paginate(4);

        } else {

            $posts = Post::where('category_id', '!=', '3')->where('category_id', '!=', '5')->where('title',"like","%" .$request->title."%")->whereIn('blogger_id', $ids)->paginate(4);

        }

        return view('index',compact("posts"));
    }
}
