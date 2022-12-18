<?php

use Illuminate\Support\Facades\Route;

Route::prefix('tonttu')->group(function () {

    Route::get('', function () {
        return view('lp');
    });

});

// Route::get('/tonttu', function () {
//     return view('lp');
// });

Route::get('/', function () {
    return view('welcome');
});
