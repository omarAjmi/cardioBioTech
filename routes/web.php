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

Route::get('/admin/events', function(){
    return view('admin.events.events', ['events' => collect([new App\Event()])]);
})->name('admin.events');

Route::get('/admin/events/new', function(){
    return view('admin.events.new');
})->name('admin.newEvent');

Route::post('/admin/events/create', function(){
    return view('admin.contact');
})->name('admin.createEvent');
