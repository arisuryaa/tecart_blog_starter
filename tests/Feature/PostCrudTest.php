<?php

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->withoutVite();
});

it('lists the latest posts first', function () {
    Post::factory()->create(['title' => 'Artikel Lama', 'created_at' => now()->subDay()]);
    Post::factory()->create(['title' => 'Artikel Baru', 'created_at' => now()]);

    $this->get(route('posts.index'))
        ->assertOk()
        ->assertSeeInOrder(['Artikel Baru', 'Artikel Lama']);
});

it('renders the create form', function () {
    $this->get(route('posts.create'))->assertOk();
});

it('stores a post and flashes a success message', function () {
    $this->post(route('posts.store'), ['title' => 'Judul Baru', 'body' => 'Isi artikel.'])
        ->assertRedirect(route('posts.index'))
        ->assertSessionHas('success');

    $this->assertDatabaseHas('posts', ['title' => 'Judul Baru', 'body' => 'Isi artikel.']);
});

it('rejects a post without title and body', function () {
    $this->from(route('posts.create'))
        ->post(route('posts.store'), ['title' => '', 'body' => ''])
        ->assertRedirect(route('posts.create'))
        ->assertSessionHasErrors(['title' => 'Judul wajib diisi.', 'body' => 'Isi artikel wajib diisi.']);

    $this->assertDatabaseCount('posts', 0);
});

it('shows a single post', function () {
    $post = Post::factory()->create(['title' => 'Detail Artikel']);

    $this->get(route('posts.show', $post))
        ->assertOk()
        ->assertSee('Detail Artikel');
});

it('renders the edit form with the current values', function () {
    $post = Post::factory()->create(['title' => 'Judul Lama']);

    $this->get(route('posts.edit', $post))
        ->assertOk()
        ->assertSee('Judul Lama');
});

it('updates a post', function () {
    $post = Post::factory()->create();

    $this->put(route('posts.update', $post), ['title' => 'Judul Diubah', 'body' => 'Isi diubah.'])
        ->assertRedirect(route('posts.index'))
        ->assertSessionHas('success');

    expect($post->fresh()->title)->toBe('Judul Diubah');
});

it('deletes a post', function () {
    $post = Post::factory()->create();

    $this->delete(route('posts.destroy', $post))
        ->assertRedirect(route('posts.index'))
        ->assertSessionHas('success');

    $this->assertModelMissing($post);
});
