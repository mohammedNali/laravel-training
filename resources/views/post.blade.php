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

<article>
    <h1>
        {{ $post_content->title }}
    </h1>
    <img src="{{ $post_content->image }}" alt="">
    <p>
        {!! $post_content->body !!}
    </p>
</article>


<a href="/">Go Back</a>

</body>
</html>
