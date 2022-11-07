<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PhpParser\Node\Expr\Cast\String_;
use Psy\Readline\Hoa\Console;

use function GuzzleHttp\Promise\all;

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

        return view('admin.posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = new Post();
        $post->created_at = date_default_timezone_get();
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->statut = ($request->input('statut') == "on") ? 'Published' : 'Unpublished';
        $post->slug = Str::slug($request->input('title'));

        $post->save();

        session()->flash('success', "L'article a bien été ajouté");

        return redirect()->route('posts.create');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $slug,)
    {
        $post = Post::find($id);
        return view('admin.posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.posts.edit', ['post' => $post]);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = Post::find($id);
        $post->updated_at = date_default_timezone_get();
        $post->title = $request->input('title');
        $post->statut = ($request->input('statut') == "on") ? 'Published' : 'Unpublished';
        $post->description = $request->input('description');
        $post->slug = Str::slug($request->input('title'));

        $post->update();

        session()->flash('success', "L'article a bien été mis à jour");

        $posts = Post::latest()->get();
        return redirect()->route('posts.index', ['posts' => $posts]);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        session()->flash('success', "L'article a bien été éffacé");

        $posts = Post::latest()->get();
        return redirect()->route('posts.index', ['posts' => $posts]);

        //
    }
}
