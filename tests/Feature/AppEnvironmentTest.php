<?php

use Illuminate\Support\Facades\App;

test('testAppEnvironment', function () {
    var_dump(App::environment());
});
