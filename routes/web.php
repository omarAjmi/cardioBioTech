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

Route::get('/', [
    'as' => 'welcome',
    'uses' => 'WelcomeController@welcome'
]);

Auth::routes();

Route::get('/events', function(){
    return view('public.events');
})->name('events');
Route::get('/contact', function(){
    return view('public.contact');
})->name('contact');

Route::group(['prefix'=>'/admin', 'middleware'=>['auth', 'admin']], function(){
    Route::get('/', [
    'as' => 'admin',
    'uses' => 'AdminController@welcome'
    ]);

    Route::get('/events', [
        'as' => 'admin.events',
        'uses' => 'EventsController@events'
    ]);
    Route::get('/events/new', [
        'as' => 'admin.newEvent',
        'uses' => 'EventsController@new'
    ]);

    Route::post('/events/create', [
        'as' => 'admin.createEvent',
        'uses' => 'EventsController@create'
    ]);

    Route::get('/events/download/event/{id}/{fileName}', [
        'as' => 'admin.downloadFileEvent',
        'uses' => 'EventsController@downloadProgram'
    ]);
});