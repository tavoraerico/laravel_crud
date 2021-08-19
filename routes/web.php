<?php

use Illuminate\Support\Facades\Route;

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


Route::resource('/livros', 'App\Http\Controllers\LivroController');

Route::get('/livros', 'App\Http\Controllers\LivroController@index')->name('index');
Route::get('/livros/create', 'App\Http\Controllers\LivroController@create');
Route::post('/livros/create', 'App\Http\Controllers\LivroController@store')->name('create');
Route::get('/livros/destroy', 'App\Http\Controllers\LivroController@destroy');
Route::delete('/livros/{livro}', 'App\Http\Controllers\LivroController@destroy')->name('destroy');
Route::get('/livros/{livro}', 'App\Http\Controllers\LivroController@show')->name('show');
Route::post('/livros/{livro}/edit', 'App\Http\Controllers\LivroController@edit')->name('edit');
Route::put('/livros/{livro}', 'App\Http\Controllers\LivroController@update')->name('update');

Route::get('/auth/login',[LivroController::class, 'login'])->name('auth.login');
//Route::get('/livros/read', 'App\Http\Controllers\LivrosController@read');
//Route::get('/livros/index', 'App\Http\Controllers\LivroController@edit');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
