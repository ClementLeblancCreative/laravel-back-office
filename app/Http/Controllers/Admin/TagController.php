<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PhpParser\Node\Expr\Cast\String_;
use Psy\Readline\Hoa\Console;
use Illuminate\Support\Facades\File;

use function GuzzleHttp\Promise\all;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tag = Tag::latest()->get();

        return view('admin.tag.index', ['tag' => $tag]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        $tag = new Tag();
        $tag->created_at = date_default_timezone_get();
        $tag->name = $request->input('name');
        $tag->color = $request->input('color');

        $tag->save();

        session()->flash('success', "L'article a bien été ajouté");

        return redirect()->route('tag.create');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::find($id);
        return view('admin.tag.show', ['tag' => $tag]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('admin.tag.edit', ['tag' => $tag]);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, $id)
    {
        $tag = Tag::find($id);
        $tag->updated_at = date_default_timezone_get();
        $tag->name = $request->input('name');
        $tag->color = $request->input('color');

        $tag->update();

        session()->flash('success', "L'article a bien été mis à jour");

        $tag = Tag::latest()->get();
        return redirect()->route('tag.index', ['tag' => $tag]);
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
        $tag = Tag::find($id);
        $tag->delete();

        session()->flash('success', "L'article a bien été éffacé");

        $tag = Tag::latest()->get();
        return redirect()->route('tag.index', ['tag' => $tag]);

        //
    }
    //
}
