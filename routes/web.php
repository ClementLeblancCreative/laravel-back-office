<?php

use App\Http\Controllers\Admin\PostController;
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
});

require __DIR__ . '/auth.php';
