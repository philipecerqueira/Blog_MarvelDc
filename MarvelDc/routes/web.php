<?php

use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('teste');
//});

Route::get('/', function () {
    return view('Posts.index');
});

Route::get('/create', function () {
    return view('Posts.create');
});


