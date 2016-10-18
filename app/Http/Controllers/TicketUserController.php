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

    	$usuario->asignar($ticket);

    	session()->flash('success','El usuario fue asignado exitosamente');

    	return redirect()->back();
    }

    public function destroy($id, $user)
    {
    	$ticket = Ticket::findOrFail($id);
    	$usuario = User::findOrFail($user);

    	$usuario->desasignar($ticket);

    	session()->flash('success','El usuario fue quitado exitosamente');

    	return redirect()->back();
    }
}
