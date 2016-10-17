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
    'as'   => 'tickets.pending',
    'uses' => 'TicketController@pending'
]);

Route::get('/abiertos',[
    'as'   => 'tickets.opened',
    'uses' => 'TicketController@opened'
]);

Route::get('/cerrados',[
    'as'   => 'tickets.closed',
    'uses' => 'TicketController@closed'
]);

Route::get('/vencidos',[
    'as'   => 'tickets.overdue',
    'uses' => 'TicketController@overdue'
]);

Route::get('/detalles/{id}',[
    'as'   => 'tickets.details',
    'uses' => 'TicketController@details'
]);

Auth::routes();

Route::group(['middleware' => 'auth'], function(){

    Route::get('/solicitar',[
        'as'   => 'tickets.create',
        'uses' => 'TicketController@create'
    ]);

    Route::post('/solicitar',[
        'as'   => 'tickets.store',
        'uses' => 'TicketController@store'
    ]);
/*
    Route::get('/comentar/{id}',[
        'as'   => 'comments.create',
        'uses' => 'TicketCommentController@create'
    ]);
*/
    Route::post('/comentar/{id}',[
        'as'   => 'comments.submit',
        'uses' => 'TicketCommentController@submit'
    ]);

    Route::post('/cambioEstado/{id}',[
        'as'   => 'tickets.status',
        'uses' => 'TicketController@status'
    ]);

});


/*
Route::get('/home', 'HomeController@index');
*/