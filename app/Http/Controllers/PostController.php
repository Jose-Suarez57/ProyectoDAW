<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Commentary;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Category::all();
        return view('posts.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'numeric|min:1|max:7',
            'title' => 'required|min:3|max:100',
            'text' => 'required|min:3|max:2000',
            'image' => 'image|2048',
            'tags' => 'required',
            'image' => 'image|max:1000',
        ]);

        $miImagen = null;

        if($request->file('image') !== null) $miImagen = $request->file('image')->store('public');

        $post = new Post;

        $post->blogger_id = Auth::user()->id;
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->text = $request->text;
        $post->tags = json_encode($request->tags);
        $post->image = Storage::url($miImagen);
        $post->banned = 0;

        $post->save();

        return redirect()->route('index')->with('success','');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {

        $usuarios = User::whereRaw('banned = 0')->get();

        $ids = [];

        foreach($usuarios as $usuario){

            array_push($ids, $usuario->id);

        }

        $commentaries = Commentary::where('post_id', '=', $post->id)->whereIn('user_id', $ids)->paginate(4);

        return view('posts.show', compact('post', 'commentaries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categorias = Category::all();

        return view('posts.edit', compact('post', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        $request->validate([
            'category_id' => 'numeric|min:1|max:7',
            'title' => 'required|min:3|max:100',
            'text' => 'required|min:3|max:2000',
            'image' => 'image|2048',
            'tags' => 'required',
            'image' => 'image|max:1000',
        ]);

        $miImagen = '';

        if($request->file('image') !== null) $miImagen = $request->file('image')->store('public');

        if($request->NoImage == true) $miImagen = '';

        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->text = $request->text;
        $post->tags = json_encode($request->tags);
        $post->image = Storage::url($miImagen);
        $post->banned = 0;

        $post->save();

        return redirect()->route('index')->with('success','');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::find($post->id)->delete();

        return redirect()->route('index')->with('success','');
    }
}
