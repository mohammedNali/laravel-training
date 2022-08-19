<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UsersController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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

Route::get('/', [PostsController::class, 'index'])->name('home');
// Route Wildcard Constraints
Route::get('posts/{post:slug}', [PostsController::class, 'show']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');


Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');


Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

//Route::resource('posts', PostsController::class)->only([
//    'create', 'show', 'edit', 'store', 'destroy'
//]);



Route::resource('categories', CategoryController::class);


//Route::get('categories/{category:name}', function (Category $category) {
//    return view('posts.index', [
//        'posts' => $category->posts,
//        'categories' => Category::all(),
//        'currentCategory' => $category,
//    ]);
//})->name('category');

///author/{{ $post->author->id }}
Route::get('author/{author:username}', function (User $author) {
    return view('posts.index', [
        'posts' => $author->posts
//            ->load(['category', 'author'])
    ]);
});

//programmer.test/users
//Route::get('users', [UsersController::class, 'index']);









