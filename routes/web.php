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


Auth::routes();

Route::group(['middleware' => 'auth'], function(){

    Route::get('/',[
        'as'   => 'tickets.latest',
        'uses' => 'TicketController@latest'
    ]);

    Route::post('/busqueda',[
        'as'   => 'tickets.search',
        'uses' => 'TicketController@search'
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
//Crear Tickets
    Route::get('/solicitar',[
        'as'   => 'tickets.create',
        'uses' => 'TicketController@create'
    ]);

    Route::post('/solicitar',[
        'as'   => 'tickets.store',
        'uses' => 'TicketController@store'
    ]);


//Comentar
    Route::post('/comentar/{id}',[
        'as'   => 'comments.submit',
        'uses' => 'TicketCommentController@submit'
    ]);

//Subir archivo a Ticket
    Route::post('/upload/{id}',[
        'as'   => 'comments.uploadfile',
        'uses' => 'TicketCommentController@uploadfile'
    ]);

//Cambiar Estado de Ticket
    Route::post('/cambioEstado/{id}',[
        'as'   => 'tickets.status',
        'uses' => 'TicketController@status'
    ]);

//Encargados del ticket
    Route::post('/encargados/{id}',[
        'as'   => 'encargados.submit',
        'uses' => 'TicketUserController@submit'
    ]);

    Route::delete('/encargados/{id}/user/{user}',[
        'as'   => 'encargados.destroy',
        'uses' => 'TicketUserController@destroy'
    ]);

    Route::get('/tareas',[
        'as'   => 'informes.tareas',
        'uses' => 'TicketController@tareas'
    ]);

    Route::get('/documentos',[
        'as'   => 'informes.documentos',
        'uses' => 'TicketController@documentos'
    ]);

    //Rutas de FileManager
    Route::get('/filemanager',[
        'as'   => 'filemanager.files_index',
        'uses' => 'FileManagerController@index'
    ]);

    Route::get('/getfile/{filename}',[
        'as'   => 'filemanager.get',
        'uses' => 'FileManagerController@get'
    ]);

    Route::post('/addfile/{id}',[
        'as'   => 'filemanager.add',
        'uses' => 'FileManagerController@add'
    ]);

});


/*
Route::get('/home', 'HomeController@index');
*/