<?php

namespace App\Http\Controllers;

use App\Models\Post;

class pageController extends Controller
{
    public function home()
    {

        $posts = Post::with('tags')->latest()->get()->where('statut', 'Published');
        return view('pages.home', ['posts' => $posts]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::with('tags')->find($id);
        return view('admin.posts.show', ['post' => $post, 'retourlink' => 'index']);
    }
    //
}
