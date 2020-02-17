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
use App\Items;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', 'AdminController@index')->name('admin');

Route::get('/admin/edit/{id}', 'AdminController@edit');

Route::get('/admin/add', 'AdminController@add')->name('create');

Route::post('/addItem', 'AdminController@create')->name('addItem');

Route::post('/delete', 'AdminController@delete')->name('delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
