<?php

test('testConfig', function () {
    $firstName = config('contoh.name.first');
    $lastName = config('contoh.name.last');
    $email = config('contoh.email');
    self::assertEquals('Haikal', $firstName);
    self::assertEquals('Bintang', $lastName);
    self::assertEquals('mhaikalbintang.work@gmail.com', $email);
});
