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
Route::get('/author/{author_id}', 'AuthorController@update');
Route::post('/author/{author_id}', 'AuthorController@store');

// Book
Route::get('/', 'BookController@show');
Route::get('/search', 'BookController@showBySearchQuery');
Route::post('/books/create', 'BookController@store');
Route::delete('/books/delete/{book_id}', 'BookController@destroy');

// Downloads
Route::get('/download', 'FileController@show')->name('files.index');
Route::get('/download/csv/{format_type}', 'FileController@downloadCSV')->name('files.download-csv');
Route::get('/download/xml/{format_type}', 'FileController@downloadXML')->name('files.download-xml');;
