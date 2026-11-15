<!DOCTYPE html>
<html>
<head><title>Edit Artikel</title></head>
<body>
    <h1>Edit Artikel</h1>

    <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Judul</label>
        <input type="text" name="title" value="{{ $post->title }}">

        <label>Isi Artikel</label>
        <textarea name="body">{{ $post->body }}</textarea>

        <button type="submit">Perbarui</button>
    </form>

    <a href="{{ route('posts.index') }}">Kembali</a>
</body>
</html>
