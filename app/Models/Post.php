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
            ->sortBy('date');
//                ->sortByDesc('date');
        });
    }


    public static function find($slug) {

        return static::all()->firstWhere('slug', $slug);

    }

    public static function findOrFail($slug) {

        $post = static::find($slug);
        if (! $post) {
            throw new ModelNotFoundException();
        }
        return $post;

    }


}
