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
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/events', function(){
    return view('public.events');
})->name('events');
Route::get('/contact', function(){
    return view('public.contact');
})->name('contact');

Route::get('/admin', function(){
    return view('admin.welcome');
})->name('admin');

Route::get('/admin/events', [
    'as' => 'admin.events',
    'uses' => 'EventsController@events'
]);
Route::get('/admin/events/new', [
    'as' => 'admin.newEvent',
    'uses' => 'EventsController@new'
]);

Route::post('/admin/events/create', [
    'as' => 'admin.createEvent',
    'uses' => 'EventsController@create'
]);
