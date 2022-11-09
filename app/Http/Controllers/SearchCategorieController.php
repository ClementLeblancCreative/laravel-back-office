<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class SearchCategorieController extends Controller
{
    public function show(Category $category)
    {
        $posts = Post::with(['category', 'tags'])
            ->where(['statut' => 'Published', "category_id" => $category->id])
            ->latest()
            ->get();
        $categories = Category::all();
        $tags = Tag::all();

        return view('pages.home', ['posts' => $posts, 'categories' => $categories, 'tags' => $tags]);
    }
}
