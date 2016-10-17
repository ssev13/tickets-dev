<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Entities\TicketComment;
use App\Entities\Ticket;

class TicketCommentController extends Controller
{

    public function submit(Request $request, $id)
    {

    	$this->validate($request, [
    		'tipo'       => 'required',
    		'comentario' => 'required|max:500',
    		'responde'   => 'required'
    	]);

    	$comment = new TicketComment($request->all());
    	$comment->user_id = \Auth::user()->id;

    	$ticket = Ticket::findOrFail($id);
    	$ticket->comments()->save($comment);

        if ($request['tipo'] == 'Solucion') {
            $ticket->estado = 'Cerrado';
            $ticket->save();
        }

    	session()->flash('success','Tu comentario fue guardado exitosamente');
    	return redirect()->back();

//    	dd($request->all());
    }
}
