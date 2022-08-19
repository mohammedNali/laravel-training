<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        dd(\request(['search']));
//        dd(\request('search'));
//        dd(\request());
//        dd(\request()->only('search'));
//        return view('posts.index', [
////            'posts' => Post::latest()->with('category', 'author')->get(),
//            'posts' => Post::latest()->filter(\request(['search', 'category', 'author']))->get(),
////            'categories' => Category::all(),
////            'currentCategory' => Category::where('slug', \request('category'))->first()
////            'currentCategory' => Category::firstWhere('slug', \request('category'))
//        ]);

//        return Post::latest()->filter(\request(['search', 'category', 'author']))->get();


//        return Post::latest()->filter(\request(['search', 'category', 'author']))->paginate();


        return view('posts.index', [
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'author'])
            )->paginate(6)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }



    public function show(Post $post)
    {
//        $post = Post::where('slug', $slug)->first();
        return view('posts.post', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
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
        //
    }


}
