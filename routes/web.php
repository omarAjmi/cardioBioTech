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

    Route::get('/current', ['as' => 'current','uses' => 'PublicController@currentEvent']);

    Route::get('/event/{id}', ['as'=>'event', 'uses'=>'PublicController@event']);

    Route::get('/contact', ['as'=>'contact', 'uses'=>'PublicController@contact']);

});

    Route::get('/users/{id}', ['as'=> 'profile', 'uses'=>'UsersController@profile']);

    Route::put('/users/{id}/profile/update', ['as'=> 'profile.update', 'uses'=>'UsersController@update']);

    Route::get('/events/download/event/{id}/{fileName}', ['as' => 'downloadFileEvent','uses' => 'EventsController@downloadProgram'
    ]);

    Route::put('/users/{id}/profile/update_avatar', ['as'=> 'profile.updateAvatar', 'uses'=>'UsersController@updateAvatar']);

    Route::post('/users/event/{id}/participation', ['as'=> 'events.participate', 'uses'=>'ParticipationsController@participate']);

Route::group(['prefix'=>'/admin', 'middleware'=>['auth', 'admin']], function(){
    
    Route::get('/', ['as' => 'admin','uses' => 'AdminController@welcome']);
    
    //------------------EVENTS---------------------------------------------//

    Route::get('/events/new', ['as' => 'admin.newEvent','uses' => 'EventsController@new']);

    Route::post('/events/create', ['as' => 'admin.createEvent','uses' => 'EventsController@create']);

    Route::get('/events/{id}', ['as' => 'admin.previewEvent','uses' => 'EventsController@preview']);

    Route::put('/events/{id}/update', ['as' => 'admin.updateEvent','uses' => 'EventsController@update']);

    Route::delete('/events/{id}/delete', ['as' => 'admin.deleteEvent','uses' => 'EventsController@delete']);

        //------------------EVENTS PARTICIPATION---------------------------//

    Route::get('/events/{event_id}/participations', ['as'=>'participations', 'uses'=>'ParticipationsController@participations']);
    
    Route::get('/events/{event_id}/participations/{participation_id}/download', ['as' => 'participation.download','uses' => 'ParticipationsController@downloadParticipationFile']);

    Route::get('/events/{event_id}/participations/confirmed', ['as' => 'participation.confirmed','uses' => 'ParticipationsController@confirmedParticipants']);

    Route::get('/events/{event_id}/participations/postponed', ['as' => 'participation.postponed','uses' => 'ParticipationsController@postponedParticipants']);

    Route::put('/events/{event_id}/participations/{part_id}/confirm', ['as' => 'participation.confirm','uses' => 'ParticipationsController@confirm']);

    Route::delete('/events/{event_id}/participations/{id}/refuse', ['as' => 'participation.refuse','uses' => 'ParticipationsController@refuse']);

    //------------------EVENTS GALLERIES---------------------------------//

    Route::get('/events/{event_id}/gallerie/add_images', ['as' => 'galleries.addImagesForm', 'uses' => 'GalleriesController@addImagesForm']);

    Route::get('/events/{event_id}/gallerie/add_videos', ['as' => 'galleries.addVideosForm', 'uses' => 'GalleriesController@addVideosForm']);

    Route::post('/events/{event_id}/gallerie/add_images', ['as' => 'galleries.addImages', 'uses' => 'GalleriesController@addImages']);

    Route::post('/events/{event_id}/gallerie/add_videos', ['as' => 'galleries.addVideos', 'uses' => 'GalleriesController@addVideos']);

    Route::get('/events/{event_id}/gallerie/images', ['as' => 'galleries.preview', 'uses' => 'GalleriesController@preview']);

    Route::delete('/events/{event_id}/gallerie/remove_image/{image_id}', ['as' => 'galleries.removeImage', 'uses' => 'GalleriesController@deleteImage']);

    Route::delete('/events/{event_id}/gallerie/remove_video/{video_id}', ['as' => 'galleries.removeVideo', 'uses' => 'GalleriesController@deleteVideo']);

    //------------------EVENTS COMMITEES-----------------------------//

    Route::get('/events/{event_id}/commitee/members', ['as' => 'commitees.preview', 'uses' => 'CommiteesController@members']);

    Route::post('/events/{event_id}/commitee/add_member', ['as' => 'commitees.addMember', 'uses' => 'CommiteesController@createMember']);

    Route::get('/events/{event_id}/commitee/add_member', ['as' => 'commitees.new', 'uses' => 'CommiteesController@addMember']);

    Route::delete('/events/{event_id}/commitee/remove_member/{member_id}', ['as' => 'commitees.removeMember', 'uses' => 'CommiteesController@removeMember']);


    //------------------EVENTS COMMITEES-----------------------------//

    Route::get('/events/{event_id}/sponsors/all', ['as' => 'sponsors.preview', 'uses' => 'SponsorsController@sponsors']);

    Route::get('/events/{event_id}/sponsors/add', ['as' => 'sponsors.addSponsorForm', 'uses' => 'SponsorsController@addSponsorForm']);

    Route::post('/events/{event_id}/sponsors/create', ['as' => 'sponsors.addSponsor', 'uses' => 'SponsorsController@addSponsor']);

    Route::delete('/events/{event_id}/sponsors/{sponsor_id}/delete', ['as' => 'sponsors.removeSponsor', 'uses' => 'SponsorsController@removeSponsor']);

    //------------------NOTIFICATIONS---------------------------//

    Route::put('/notifications/{id}', ['as' => 'notif.makeSeen','uses' => 'NotificationsController@markSeenNotif']);

    Route::get('/notifications', ['as' => 'notifs','uses' => 'NotificationsController@notifications']);

});

Route::get('/resetdb', function (){
    Artisan::call('migrate:fresh');
    return 1;
});
