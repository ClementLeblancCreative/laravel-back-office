<?php

use App\Http\Controllers\Admin\CategoryControler;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\pageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/hello', function () {
    return view('hello');
});

Route::middleware('auth')->group(function () {

    Route::get('/', [PageController::class, 'home'])->name('index');

    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

    Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');

    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

    Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');

    Route::get('/posts/show/{id}-{slug}', [PostController::class, 'show'])->name('posts.show');

    Route::put('/posts/update/{id}', [PostController::class, 'update'])->name('posts.update');

    Route::get('/posts/destroy/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');



    Route::get('/category', [CategoryControler::class, 'index'])->name('category.index');

    Route::post('/category/store', [CategoryControler::class, 'store'])->name('category.store');

    Route::get('/category/create', [CategoryControler::class, 'create'])->name('category.create');

    Route::get('/category/edit/{id}', [CategoryControler::class, 'edit'])->name('category.edit');

    Route::get('/category/show/{id}', [CategoryControler::class, 'show'])->name('category.show');

    Route::put('/category/update/{id}', [CategoryControler::class, 'update'])->name('category.update');

    Route::get('/category/destroy/{id}', [CategoryControler::class, 'destroy'])->name('category.destroy');


    Route::get('/tag', [TagController::class, 'index'])->name('tag.index');

    Route::post('/tag/store', [TagController::class, 'store'])->name('tag.store');

    Route::get('/tag/create', [TagController::class, 'create'])->name('tag.create');

    Route::get('/tag/edit/{id}', [TagController::class, 'edit'])->name('tag.edit');

    Route::get('/tag/show/{id}', [TagController::class, 'show'])->name('tag.show');

    Route::put('/tag/update/{id}', [TagController::class, 'update'])->name('tag.update');

    Route::get('/tag/destroy/{id}', [TagController::class, 'destroy'])->name('tag.destroy');
});

require __DIR__ . '/auth.php';
