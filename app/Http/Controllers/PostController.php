<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::latest()->get();

        return view('posts.index', ['posts' => $posts]);
    }

    public function create(): View
    {
        return view('posts.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Post::create($this->validatedData($request));

        return redirect()->route('posts.index')->with('success', 'Artikel berhasil disimpan.');
    }

    public function show(Post $post): View
    {
        return view('posts.show', ['post' => $post]);
    }

    public function edit(Post $post): View
    {
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request, Post $post): RedirectResponse
    {
        $post->update($this->validatedData($request));

        return redirect()->route('posts.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Artikel berhasil dihapus.');
    }

    /**
     * @return array{title: string, body: string}
     */
    private function validatedData(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
        ], [
            'title.required' => 'Judul wajib diisi.',
            'title.max' => 'Judul maksimal 255 karakter.',
            'body.required' => 'Isi artikel wajib diisi.',
        ]);
    }
}
