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


Route::get('/', function () {
    return view('dashboard');
});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

//Application Route
Route::resource('/application','ApplicationController');
Route::get('/category', 'CategoryController@index')->name('category.index');
Route::post('/category/store', 'CategoryController@store')->name('category.store');
Route::get('/category/edit/{id}', 'CategoryController@edit')->name('category.edit');
Route::put('/category/update/{id}', 'CategoryController@update')->name('category.update');
Route::delete('/category/destroy/{id}', 'CategoryController@destroy')->name('category.destroy');
