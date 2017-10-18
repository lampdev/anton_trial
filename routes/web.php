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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/contacts', 'ContactsController@index')->name('contacts');

Route::get('/add_contact', 'ContactsController@add')->name('add_contact');

Route::post('/add_contact_post', 'ContactsController@addPost')->name('add_contact_post');

Route::get('/edit_contact/{id}', 'ContactsController@edit')->name('edit_contact');

Route::post('/edit_contact_post/{id}', 'ContactsController@editPost')->name('edit_contact_post');

Route::get('/delete_contact/{id}', 'ContactsController@delete')->name('delete_contact');