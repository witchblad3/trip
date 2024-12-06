<?php

use Illuminate\Support\Facades\Route;

Route::any('/api/{any}', function ($any) {
    $response = \Illuminate\Support\Facades\Http::send(
        request()->method(),
        url('/api/' . $any),
        request()->all()
    );

    return response($response->body(), $response->status());
})->where('any', '.*');

Route::get('/', function () {
    return 'hello world';
});
