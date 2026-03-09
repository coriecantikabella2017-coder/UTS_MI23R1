<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/', fn () => 'Home');
Route::get('/gallery', fn () => view('Gallery'));
Route::get('/contact', fn () => view('pages.Contact'));
Route::get('/about', fn () => 'About');
Route::get('/user', fn () => "My name is {$_GET['name']}");
Route::get('/user/{user}', fn ($user) => "My name is {$user}")->whereAlphaNumeric('user');
