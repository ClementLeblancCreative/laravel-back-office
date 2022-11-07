<?php

namespace App\Http\Controllers;

use App\Models\Post;

class pageController extends Controller
{
    public function home()
    {

        $posts = Post::latest()->get();
        return view('pages.home', ['posts' => $posts, 'origine' => 'Acceuil']);
    }
    //
}
