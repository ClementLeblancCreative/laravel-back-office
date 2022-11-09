<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class SearchTagController extends Controller
{
    public function show(Tag $tag)
    {
        $post = $tag->posts()
            ->with(['category', 'tags'])
            ->where('published', 'Published')
            ->latest()
            ->get();

        return view('pages.home', ['posts' => $post]);
    }
}
