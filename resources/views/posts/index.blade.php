<!DOCTYPE html>
<html>
<head>
    <title>Daftar Artikel</title>
 @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <h1 class="text-red-500">TecArt Blog</h1>
    <a href="{{ route('posts.create') }}">Tulis Artikel</a>

    <h2>Daftar Artikel</h2>

    @foreach ($posts as $post)
        <div>
            <h3>{{ $post->title }}</h3>
            <p>{{ $post->created_at->format('d/m/Y') }}</p>
            <p>{{ $post->body }}</p>

            <a href="{{ route('posts.show', $post) }}">Detail</a>
            <a href="{{ route('posts.edit', $post) }}">Edit</a>

            <form action="{{ route('posts.destroy', $post) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </div>
        <hr>
    @endforeach
</body>
</html>
