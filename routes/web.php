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

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/', [PageController::class, 'home'])->name('index')->middleware('auth');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index')->middleware('auth');;

Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store')->middleware('auth');;

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('auth');;

Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit')->middleware('auth');;

Route::get('/posts/show/{id}-{slug}', [PostController::class, 'show'])->name('posts.show')->middleware('auth');;

Route::put('/posts/update/{id}', [PostController::class, 'update'])->name('posts.update')->middleware('auth');;

Route::get('/posts/destroy/{id}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware('auth');;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard')->middleware('auth');

require __DIR__ . '/auth.php';
