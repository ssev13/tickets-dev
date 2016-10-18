<?php

namespace App\Http\Controllers;

use App\Entities\User;
use App\Entities\Ticket;
use App\Entities\TicketCategory;
use App\Entities\TicketComment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

use Illuminate\Support\Facades\Redirect;

class TicketController extends Controller
{
    public function latest()
    {

        $tickets = Ticket::orderBy('created_at','DESC')->paginate();
        return view('tickets/list', compact('tickets'));
    }

    public function pending()
    {
        $tickets = Ticket::where('estado','Pendiente')->paginate();
        return view('tickets/list', compact('tickets'));
    }

    public function opened()
    {
        $tickets = Ticket::where('estado','Abierto')->paginate();
        return view('tickets/list', compact('tickets'));
    }

    public function closed()
    {
        $tickets = Ticket::where('estado','Cerrado')->paginate();
        return view('tickets/list', compact('tickets'));
    }

    public function overdue()
    {
        $tickets = Ticket::where('estado','Vencido')->paginate();
        return view('tickets/list', compact('tickets'));
    }

    public function details($id)
    {
        $ticket = Ticket::findOrFail($id);
        $opciones = ['Seguimiento', 'Tarea', 'Solucion']; 
        $usuarios = User::where('perfil', '!=','usuario')->get();
        return view('tickets/details', compact('ticket','opciones','usuarios'));
    }

    public function create()
    {
        $categories = TicketCategory::where('parent_id',0)->get();
        return view('tickets.create', compact('categories'));
    }

    public function store(Request $request)
    {

        $this->validate($request,[
            'titulo'       => 'required|max:120',
            'cuerpoTicket' => 'required',
            'categoria'    => 'required'
        ]);

        $ticket = \Auth::user()->tickets()->create([
            'titulo'                => $request->get('titulo'),
            'detalle'               => $request->get('cuerpoTicket'),
            'ticket_categories_id'  => $request->get('categoria'),
            'estado'                => 'Pendiente',
        ]);

        return Redirect::route('tickets.details',$ticket->id);
    }

    public function comment()
    {
        $categories = TicketCategory::all();
        return view('tickets.create', compact('categories'));
    }


    public function status(Request $request, $id)
    {

        $this->validate($request, [
            'estado'     => 'required',
        ]);

        $ticket = Ticket::findOrFail($id);

        $ticket->estado = $request->estado;
        $ticket->save();

        $comment = new TicketComment();
        $comment->tipo = 'Seguimiento';
        $comment->responde = 0;
        $comment->comentario = 'Cambio de estado a '.$request->estado;
        $comment->user_id = \Auth::user()->id;

        $ticket->comments()->save($comment);

        session()->flash('success','Se cambio exitosamente el estado del ticket');
        return redirect()->back();

    }

}