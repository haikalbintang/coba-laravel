<?php

test('home page is displayed', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
