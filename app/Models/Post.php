<?php

namespace App\Models;



use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{

    public $title;
    public $date;
    public $slug;
    public $excerpt;
    public $body;
    public $image;

    public function __construct($title, $slug, $excerpt, $date, $image, $body)
    {
        $this->title = $title;
        $this->slug = $slug;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->image = $image;
        $this->body = $body;
    }


    public static function all()
    {

        return cache()->remember('posts.all', 30, function () {
            $files = File::files(resource_path("posts"));
            return collect($files)
                ->map(function ($file) {
                    return YamlFrontMatter::parseFile($file);
                })
                ->map(function ($document) {
                    return new Post(
                        $document->title,
                        $document->slug,
                        $document->excerpt,
                        $document->date,
                        $document->img,
                        $document->body()
                    );
                })
//            ->sortBy('date');
                ->sortByDesc('date');
        });


//    return array_map(function ($file) {
//        $document = YamlFrontMatter::parseFile($file);
//        return new Post(
//            $document->title,
//            $document->slug,
//            $document->excerpt,
//            $document->date,
//            $document->img,
//            $document->body()
//        );
//    },$files);

//    $posts = [];
//    foreach ($files as $file) {
//        $document = YamlFrontMatter::parseFile($file);
//        $posts[] = new Post(
//            $document->title,
//            $document->slug,
//            $document->excerpt,
//            $document->date,
//            $document->image,
//            $document->body()
//        );
//    }
//    return $posts;
//        $files = File::files(resource_path("posts/"));
//
//        // We should use collection here collect()
//        return array_map(function ($file) {
//            return $file->getContents();
//        }, $files);
    }


    public static function find($slug) {


        $posts = static::all();

        return $posts->firstWhere('slug', $slug);

////        if (! file_exists($path = __DIR__ . "/../../resources/posts/{$slug}.html")) {
//        if (! file_exists($path = resource_path("posts/{$slug}.html"))) {
////        abort(404);
////            return redirect('/');
////            throw new \Exception();
//            throw new ModelNotFoundException();
//        }
//
////    $post = cache()->remember("posts.{$slug}", 1200, function () use ($path) {
////        return file_get_contents($path);
////    });
//
//        return cache()->remember("posts.{$slug}", 5, fn() => file_get_contents($path));

    }


}
