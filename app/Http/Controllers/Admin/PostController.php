<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

use App\Category;
// Pirma dichiarazione
use App\Post;
use App\Tag;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Per prendere tutti i post e farli vedere in archivio che poi usi nella index
        $posts = Post::all();

        $categories = Category::all();

        return view('admin.posts.index', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // As tutte 
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //VALIDAZIONE
        $request->validate([ 
            'title' =>  'required|unique:posts|max:255', 
            'content' => 'required',
            'category_id' => 'nullable|exists:categories,id', // validazione della selezione 
            'tags' => 'nullable|exists:tags,id',
        ], [

            'required' => 'The :attribute is required!!',
            'unique' => 'The :attribute is already in use for an another post',
            'max' => 'Max :max chararters allowed for the :attribute'
        ]);

        $data = $request->all();
       //dd($data);

        //Slug generate
        $data['slug'] = Str::slug($data['title'], '-');

        //create and seva record on db
        $new_post = new Post();

        $new_post->fill($data); // <- fillable dichiarare prop del model post 
        
        $new_post->save();

        //Salvare relazione con tags tabella pivot
        if(array_key_exists('tags', $data)) {
            $new_post->tags()->attach($data['tags']); // Aggiunge i record nella tabella pivot
        }
        return redirect()->route('admin.posts.show', $new_post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::find($id);

        if(! $post) {
            abort(404);
        }
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::find($id);

        $categories = Category::all();
        
        $tags = Tag::all();

        if( ! $post) {
            abort(404);
        }
        
        return view('admin.posts.edit', compact('post', 'categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //VALIDE
        $request->validate([ 
            'title' => [
                Rule::unique('posts')->ignore($id),
                'max:255'
            ], 
            'content' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'nullable|exists:tags,id'
        ], [

            'required' => 'The :attribute is required!!',
            'unique' => 'The :attribute is already in use for an another post',
            'max' => 'Max :max chararters allowed for the :attribute'
        ]);
        $data = $request->all();

        //dd($data);

        $post = Post::find($id);

        //Slug gen se il titolo non cambia
        if($data['title'] != $post->title) {
            $data['slug'] = Str::slug($data['title'], '-');
        }

        $post->update($data); // Fillable nec

        //Aggiorna relazione tab pivot
        if(array_key_exists('tags', $data)) {
            //aggiungere record tab pivot
            $post->tags()->sync($data['tags']); // aggiunge e rimuove vecchio o nuovo
        } else {
            $post->tags()->detach(); // rimuove tutti i record della tab pivot
        }

        return redirect()->route('admin.posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('admin.posts.index')->with('deleted', $post->title);
    }
}
