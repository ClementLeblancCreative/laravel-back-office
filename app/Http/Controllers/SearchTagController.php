<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class SearchTagController extends Controller
{
    public function show(Tag $tag)
    {
        $posts = $tag->posts()->with(['category', 'tags'])
            ->where('statut', 'Published')
            ->latest()
            ->get();
        $categories = Category::all();
        $tags = Tag::all();

        return view('pages.home', ['posts' => $posts, 'categories' => $categories, 'tags' => $tags]);
    }
}
