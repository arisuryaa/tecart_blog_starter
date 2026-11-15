<?php

test('the home page redirects to the posts page', function () {
    $response = $this->get('/');

    $response->assertRedirect(route('posts.index'));
});
