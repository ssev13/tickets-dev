<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/',[
    'as'   => 'tickets.latest',
    'uses' => 'TicketController@latest'
]);

Route::get('/pendientes',[
    'as'   => 'tickets.opened',
    'uses' => 'TicketController@opened'
]);

Route::get('/tutoriales',[
    'as'   => 'tickets.closed',
    'uses' => 'TicketController@closed'
]);

Route::get('/populares',[
    'as'   => 'tickets.popular',
    'uses' => 'TicketController@popular'
]);


Auth::routes();

Route::get('/home', 'HomeController@index');
