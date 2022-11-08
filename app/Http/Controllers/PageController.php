<?php

namespace App\Http\Controllers;

use App\Models\Post;

class pageController extends Controller
{
    public function home()
    {

        $posts = Post::latest()->get()->where('statut', 'Published');
        return view('pages.home', ['posts' => $posts]);
    }
    //
}
