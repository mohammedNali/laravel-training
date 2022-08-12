<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostsController;
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

Route::get('/', [PostsController::class, 'index']);

Route::resource('posts', PostsController::class)->only([
    'create', 'show', 'edit', 'store', 'destroy'
]);

Route::resource('categories', CategoryController::class);


// Route Wildcard Constraints
//Route::get('/posts/{post:slug}', [PostsController::class, 'show']);



Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts.index', [
        'posts' => $category->posts
//            ->load(['category', 'author'])
    ]);
});

///author/{{ $post->author->id }}
Route::get('author/{author:username}', function (User $author) {
    return view('posts.index', [
        'posts' => $author->posts
//            ->load(['category', 'author'])
    ]);
});

//programmer.test/users
//Route::get('users', [UsersController::class, 'index']);









