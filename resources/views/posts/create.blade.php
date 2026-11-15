<!DOCTYPE html>
<html>
<head><title>Tulis Artikel</title></head>
<body>
    <h1>Tulis Artikel</h1>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <label>Judul</label>
        <input type="text" name="title">

        <label>Isi Artikel</label>
        <textarea name="body"></textarea>

        <button type="submit">Simpan</button>
    </form>

    <a href="{{ route('posts.index') }}">Kembali</a>
</body>
</html>
