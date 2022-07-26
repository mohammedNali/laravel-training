<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/app.css">
</head>
<body>

<?php //foreach ($posts as $post) : ?>

@foreach($posts as $post)

{{--    {{ dd($loop) }}--}}
{{--    @dd($loop)--}}

<article style="{{ $loop->last ? 'background-color: white; padding: 10px;' : '' }}">
    <h1>
        <a href="/posts/{{ $post->slug }}">
{{--            <?= $post->title; ?>--}}
{{--            <?php echo $post->title ?>--}}
            {{ $post->title }}
        </a>

    </h1>

    <p>
        {{ $post->excerpt }}
    </p>
</article>

@endforeach
<?php //endforeach; ?>

</body>
</html>
