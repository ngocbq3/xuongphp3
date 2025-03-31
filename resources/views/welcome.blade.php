<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel</title>
</head>

<body>
    <h1>Xin chào thế giới</h1>
    <a href="{{ route('posts.comment', [22, 13]) }}">Comment</a>
</body>

</html>
