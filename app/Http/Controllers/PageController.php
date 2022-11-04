<?php

namespace App\Http\Controllers;

use App\Models\Post;

class pageController extends Controller
{
    public function home()
    {
        return view('pages.home', ['posts' => collect()]);
    }
    //
}
