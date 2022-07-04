<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
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
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

        /*$validar = $request -> validate([
            'title' => 'required',
            'body' => 'required'
            
        ],['title.required'=>'Necesito un titulo', 
            'body.required'=>'Necesito el contenido']
        );*/


        $post = Post::create([
            //'user_id' => $request -> user_id = auth() -> user() -> id, 
            'user_id' => auth() -> user() -> id
            /*'title' => $request -> title,
            'body' => $request -> body*/
        ] + $request -> all() );

        if($request -> file('file'))
        {
            $post -> image = $request -> file('file') -> store('posts', 'public');
            $post -> save();
        }


        return back() -> with('status', 'Creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
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

        /*$save_post = Post::find($post -> id);
        $save_post -> title = $request -> title;
        $save_post -> body = $request -> body;
        $save_post -> save();
        return redirect() -> route('posts.index');*/
        $post -> update($request -> all());
        if($request -> file('file'))
        {
            //eliminar imagen 
            Storage::disk('public')->delete($post -> image);
            //
            $post -> image = $request -> file('file') -> store('posts', 'public');
            $post -> save();
        }

        return back()->with('status', 'Actualizado con éxito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //Eliminacion imagen
        Storage::disk('public')->delete($post -> image);
        //
        $post->delete();
        return back() -> with('status', 'Eliminado con éxito');
    }
}
