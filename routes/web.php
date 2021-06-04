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

// Author
Route::get('/author/{author_id}', 'AuthorController@edit');
Route::post('/author/{author_id}', 'AuthorController@update');

// Book
Route::get('/', 'BookController@show');
Route::get('/search', 'BookController@showBySearchQuery');
Route::post('/books/create', 'BookController@store');
Route::delete('/books/delete/{book_id}', 'BookController@destroy');

// Downloads
Route::get('/download', 'FileController@show')->name('files.index');
Route::get('/download/csv', 'FileController@downloadCSV');
Route::get('/download/xml', 'FileController@downloadXML');
