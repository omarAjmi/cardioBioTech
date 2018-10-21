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

Auth::routes();

Route::group([], function(){
    Route::get('/', ['as' => 'welcome','uses' => 'PublicController@welcome']);
    Route::get('/event/{id}', ['as'=>'event', 'uses'=>'PublicController@event']);
    Route::get('/contact', ['as'=>'contact', 'uses'=>'PublicController@contact']);

    Route::get('/users/profile', ['as'=> 'profile', 'uses'=>'UsersController@profile']);
    Route::put('/users/profile/update', ['as'=> 'profile.update', 'uses'=>'UsersController@update']);
    Route::put('/users/profile/update_avatar', ['as'=> 'profile.updateAvatar', 'uses'=>'UsersController@updateAvatar']);
    Route::put('/users/evnets/participation', ['as'=> 'participation', 'uses'=>'ParticipatinsController@participation']);
});

Route::group(['prefix'=>'/admin', 'middleware'=>['auth', 'admin']], function(){
    Route::get('/', ['as' => 'admin','uses' => 'AdminController@welcome'
    ]);

    Route::get('/events', ['as' => 'admin.events','uses' => 'EventsController@events']);

    Route::get('/events/new', ['as' => 'admin.newEvent','uses' => 'EventsController@new']);

    Route::post('/events/create', ['as' => 'admin.createEvent','uses' => 'EventsController@create']);

    Route::delete('/events/{id}', ['as' => 'admin.deleteEvent','uses' => 'EventsController@delete']);

    Route::get('/events/{id}', ['as' => 'admin.previewEvent','uses' => 'EventsController@preview']);

    Route::get('/events/download/event/{id}/{fileName}', ['as' => 'admin.downloadFileEvent','uses' => 'EventsController@downloadProgram'
    ]);
});