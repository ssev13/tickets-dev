<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Entities\Ticket;
use App\Entities\User;

class TicketUserController extends Controller
{
    public function submit($id, Request $request)
    {
    	$ticket = Ticket::findOrFail($id);
    	$usuario = User::findOrFail($request->usuarioNuevo);

        if ($ticket->usuariosacargo($usuario) > 0) {
            session()->flash('success','El usuario fue asignado exitosamente');
        }
        else {
            session()->flash('success','El primer usuario fue asignado exitosamente');
            $ticket->estado = 'Abierto';
            $ticket->save();
        }

        $usuario->asignar($ticket);

    	return redirect()->back();
    }

    public function destroy($id, $user)
    {
    	$ticket = Ticket::findOrFail($id);
    	$usuario = User::findOrFail($user);

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
