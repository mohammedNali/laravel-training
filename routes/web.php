<?php

use App\Models\Post;
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

Route::get('/', function () {
    return view('posts', [
        'posts' => Post::all(),
    ]);
});



// Route Wildcard Constraints
Route::get('/posts/{slug}', function ($slug) {
    $post_content = Post::find($slug);

    return view('post', [
        'post_content' => $post_content
    ]);
})->where('slug', '[A-z_\-]+');

