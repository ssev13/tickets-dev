<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Entities\Ticket;
use App\Entities\TicketComment;
use App\Entities\TicketCategory;
use App\Entities\TicketPriority;
use App\Entities\User;

use App\Notifications\TicketAssigned;

use Carbon\Carbon;

class TicketUserController extends Controller
{
    public function submit($id, Request $request)
    {
    	$ticket = Ticket::findOrFail($id);

//        return dd($request)->all();

    	$usuario = User::findOrFail($request->usuarioNuevo);

        $cat = $ticket->ticket_categories_id;
        $categoria = TicketCategory::findOrFail($cat);
        $prioridad = $categoria->ticket_priorities_id;
        $horas = TicketPriority::findOrFail($prioridad);
 
        $hoy = Carbon::now();
 
        $ticket->vencimiento = $hoy->addHours($horas->horas);
       
        if ($ticket->usuariosacargo($usuario) > 0) {
            session()->flash('success','El usuario fue asignado exitosamente');
        }
        else {
            session()->flash('success','El primer usuario fue asignado exitosamente');
            $ticket->estado = 'Abierto';
        }
        $ticket->save();
//Grabo un comentario con el alta de usuario
        $comment = new TicketComment();
        $comment->user_id    = \Auth::user()->id;
        $comment->tipo       = 'Seguimiento';
        $comment->comentario = 'Se agregó a '.$usuario->nombreComun.' como encargado.';
        $comment->responde   = 0;
        $comment->tipo_obs   = '';
        $ticket->comments()->save($comment);

        $usuario->asignar($ticket);

        $usuario->notify(new TicketAssigned($ticket));

    	return redirect()->back();
    }

    public function destroy($id, $user)
    {
    	$ticket = Ticket::findOrFail($id);
    	$usuario = User::findOrFail($user);

        if (auth()->user()->perfil != 'tecnico') {
            session()->flash('danger','No tiene permisos suficientes para quitar un encargado');
            return redirect()->back();
        }

//Grabo un comentario con la baja de usuario
        $comment = new TicketComment();
        $comment->user_id = \Auth::user()->id;
        $comment->tipo = 'Seguimiento';
        $comment->comentario = 'Se eliminó a '.$usuario->nombreComun.' como encargado.';
        $comment->responde = 0;
        $comment->tipo_obs = '';
        $ticket->comments()->save($comment);

    	$usuario->desasignar($ticket);

        if ($ticket->usuariosacargo($usuario) < 1) {
            session()->flash('success','El usuario fue quitado exitosamente. No hay más usuarios');
            $ticket->estado = 'Pendiente';
            $ticket->save();
        }
        else {
            session()->flash('success','El usuario fue quitado exitosamente');
        }

    	return redirect()->back();
    }

}
