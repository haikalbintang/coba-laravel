<?php

test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('testGetEnv', function () {
    $author = env('AUTHOR', 'Haikal Bintang');
    self::assertEquals('Haikal Bintang', $author);
});