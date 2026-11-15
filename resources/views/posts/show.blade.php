<!DOCTYPE html>
<html>
<head><title>{{ $post->title }}</title></head>
<body>
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->created_at->format('d/m/Y') }}</p>
    <p>{{ $post->body }}</p>

    <a href="{{ route('posts.index') }}">Kembali</a>
</body>
</html>
