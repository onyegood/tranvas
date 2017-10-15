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

Route::get('/', 'HomeController@home')->name('welcome');

Route::group(['middleware' => 'auth'], function () {

    //Event Controller Path
    $eventsController = "\App\Modules\Event\Http\Controllers\EventsController";

    Route::get('/events/list-event', "{$eventsController}@index")->name('events');
    Route::get('/events/view/{event}', "{$eventsController}@view")->name('view-event');

    Route::get('events/add', "{$eventsController}@add")->name('add-event');
    Route::post('events/save', "{$eventsController}@store")->name('save-event');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
