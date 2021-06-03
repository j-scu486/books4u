<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Book
Route::get('/', 'BookController@show');
Route::post('/books/create', 'BookController@store');
Route::delete('/books/delete/{book_id}', 'BookController@destroy');

