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
Route::get('/', 'HomeController@index');

Route::get('/search', function () {
    return view('search');
});

Route::post('/send-email', 'FeedbackController@send')->name('send-email');

Route::get('logout', 'AdminController@logout');

// Route::get('sendbasicemail','MailController@basic_email'); 

// Route::get('sendattachmentemail','MailController@attachment_email');

Route::any('sendhtmlemail','MailController@html_email')->name('sendhtmlemail');

Route::get('/admin', 'AdminController@index')->name('admin')->middleware('auth');

Route::get('/sale', 'SaleController@index')->name('sale');

Route::get('/admin/edit/{id}', 'AdminController@edit')->middleware('auth');

Route::get('/admin/add', 'AdminController@add')->name('create')->middleware('auth');

Route::get('/admin/settings', 'AdminController@settings')->name('settings')->middleware('auth');

Route::get('/admin/slider', 'AdminController@slider')->name('slider')->middleware('auth'); 

Route::post('/addItem', 'AdminController@create')->name('addItem');

Route::post('/updateItem', 'AdminController@update')->name('updateItem');

Route::post('/delete', 'AdminController@delete')->name('delete');

Route::post('/resetPassword', 'AdminController@resetPassword')->name('resetPassword');

Route::post('/emailChange', 'AdminController@emailChange')->name('emailChange');

Route::post('/sliderUpdate', 'AdminController@sliderUpdate')->name('sliderUpdate');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
