<?php

namespace App\Http\Controllers;

use App\Entities\Ticket;
use App\Entities\TicketComment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

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
        return view('tickets/details', compact('ticket'));
    }

}
