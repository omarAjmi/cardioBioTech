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
    Route::post('/users/event/{id}/participation', ['as'=> 'events.participate', 'uses'=>'ParticipationsController@participate']);
});

Route::group(['prefix'=>'/admin', 'middleware'=>['auth', 'admin']], function(){
    
    Route::get('/', ['as' => 'admin','uses' => 'AdminController@welcome']);

    Route::get('/events', ['as' => 'admin.events','uses' => 'EventsController@events']);

    Route::get('/events/new', ['as' => 'admin.newEvent','uses' => 'EventsController@new']);

    Route::post('/events/create', ['as' => 'admin.createEvent','uses' => 'EventsController@create']);

    Route::get('/notifications/{id}/seen', ['as' => 'notif.seen','uses' => 'NotificationsController@seenNotif']);

    Route::get('/notifications', ['as' => 'notifs','uses' => 'NotificationsController@notifications']);

    Route::get('/participations/{id}/download', ['as' => 'participation.download','uses' => 'ParticipationsController@downloadParticipationFile']);

    Route::get('/participations/confirmed', ['as' => 'participation.confirmed','uses' => 'ParticipationsController@confirmedParticipants']);

    Route::get('/participations/postponed', ['as' => 'participation.postponed','uses' => 'ParticipationsController@postponedParticipants']);

    Route::get('/participations/{id}/confirm', ['as' => 'participation.confirm','uses' => 'ParticipationsController@confirm']);

    Route::get('/participations/{id}/refuse', ['as' => 'participation.refuse','uses' => 'ParticipationsController@refuse']);

    Route::delete('/events/{id}', ['as' => 'admin.deleteEvent','uses' => 'EventsController@delete']);

    Route::get('/events/{id}', ['as' => 'admin.previewEvent','uses' => 'EventsController@preview']);

    Route::get('/events/download/event/{id}/{fileName}', ['as' => 'admin.downloadFileEvent','uses' => 'EventsController@downloadProgram'
    ]);
    Route::get('/galleries', ['as' => 'galleries', 'uses' => 'GalleriesController@galleries']);

    Route::get('/galleries/new', ['as' => 'galleries.new', 'uses' => 'GalleriesController@new']);

    Route::post('/galleries/create', ['as' => 'galleries.create', 'uses' => 'GalleriesController@create']);

    Route::get('/galleries/{id}', ['as' => 'galleries.files', 'uses' => 'GalleriesController@preview']);

    Route::get('/commitees/', ['as' => 'commitees', 'uses' => 'CommiteesController@commitees']);

    Route::get('/commitees/{id}/members', ['as' => 'commitees.members', 'uses' => 'CommiteesController@members']);

    Route::post('/commitees/create', ['as' => 'commitees.addMember', 'uses' => 'CommiteesController@create']);

    Route::get('/commitees/add_member', ['as' => 'commitees.new', 'uses' => 'CommiteesController@addMember']);

});