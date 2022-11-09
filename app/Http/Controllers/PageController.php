<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class pageController extends Controller
{
    public function home()
    {

        $posts = Post::with('tags')->latest()->get()->where('statut', 'Published');
        $categories = Category::all();
        $tags = Tag::all();

        return view('pages.home', ['posts' => $posts, 'categories' => $categories, 'tags' => $tags]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($retour, $slug, $id)
    {
        $post = Post::with('tags')->find($id);
        return view('admin.posts.show', ['retour' => 'acceuil', 'post' => $post]);
    }
    //
}
