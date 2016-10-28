<?php

namespace App\Http\Controllers;

use App\Entities\User;
use App\Entities\Ticket;
use App\Entities\TicketCategory;
use App\Entities\TicketPriority;
use App\Entities\TicketComment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Redirect;

class TicketController extends Controller
{
    protected function selectTicketList()
    {
        return Ticket::selectRaw(
            'tickets.*,'.
            '( SELECT nombre   FROM ticket_categories WHERE ticket_categories.id = tickets.ticket_categories_id ) as categoria,'.
            '( SELECT nombre   FROM ticket_priorities WHERE ticket_priorities.id = tickets.ticket_priorities_id ) as prioridad,'.
            '( SELECT COUNT(*) FROM ticket_comments WHERE ticket_comments.ticket_id = tickets.id ) as num_comments,'.
            '( SELECT COUNT(*) FROM ticket_users WHERE ticket_users.ticket_id = tickets.id ) as num_encargados'
            )->with('user');
    }

    public function latest()
    {
/*
        $user=\Auth::user();

        if ($user->perfil == 'tecnico') {
            $tickets = Ticket::orderBy('created_at','DESC')->paginate();
        }
        else {
            $tickets = Ticket::orderBy('created_at','DESC')->paginate();
//            $tickets = Ticket::where('user_id','currentUser()->id')->paginate();
        }
*/
        $hoy = Carbon::now();

        if (auth()->user()->perfil != 'tecnico') {
            $tickets = $this->selectTicketList()
                ->whereRaw('estado != "Cerrado" and (tickets.id in (SELECT ticket_id FROM ticket_users where user_id='.auth()->user()->id.') or tickets.user_id = '.auth()->user()->id.')')
                ->orderBy('created_at','DESC')
                ->paginate();
        }
        else {
            $tickets = $this->selectTicketList()
                ->where('estado','!=','Cerrado')
                ->orderBy('created_at','DESC')
                ->paginate();
        }

        return view('tickets/list', compact('tickets','hoy'));
    }

    public function search(Request $request)
    {
        $hoy = Carbon::now();

        $buscar = '%'.$request->busqueda.'%';

        if (auth()->user()->perfil != 'tecnico') {
            $tickets = $this->selectTicketList()
                ->whereRaw('(titulo like "'. $buscar.'" or detalle like "'. $buscar.'") and (tickets.id in (SELECT ticket_id FROM ticket_users where user_id='.auth()->user()->id.') or tickets.user_id = '.auth()->user()->id.')')
                ->paginate();
        }
        else {
            $tickets = $this->selectTicketList()
                ->where('titulo','like', $buscar)
                ->orWhere('detalle','like', $buscar)
                ->paginate();
        }

        return view('tickets/list', compact('tickets','hoy'));
    }

    public function pending()
    {
        $hoy = Carbon::now();

        if (auth()->user()->perfil != 'tecnico') {
            $tickets = $this->selectTicketList()
                ->whereRaw('estado = "Pendiente" and (tickets.id in (SELECT ticket_id FROM ticket_users where user_id='.auth()->user()->id.') or tickets.user_id = '.auth()->user()->id.')')
                ->paginate();
        }
        else {
            $tickets = $this->selectTicketList()
                ->where('estado','Pendiente')
                ->paginate();
        }

        return view('tickets/list', compact('tickets','hoy'));
    }

    public function opened()
    {
        $hoy = Carbon::now();

        if (auth()->user()->perfil != 'tecnico') {
            $tickets = $this->selectTicketList()
                ->whereRaw('estado = "Abierto" and (tickets.id in (SELECT ticket_id FROM ticket_users where user_id='.auth()->user()->id.') or tickets.user_id = '.auth()->user()->id.')')
                ->paginate();
        }
        else {
            $tickets = $this->selectTicketList()
                ->where('estado','Abierto')
                ->paginate();
        }

        return view('tickets/list', compact('tickets','hoy'));
    }

    public function closed()
    {
        $hoy = Carbon::now();

        if (auth()->user()->perfil != 'tecnico') {
            $tickets = $this->selectTicketList()
                ->whereRaw('estado = "Cerrado" and (tickets.id in (SELECT ticket_id FROM ticket_users where user_id='.auth()->user()->id.') or tickets.user_id = '.auth()->user()->id.')')
                ->paginate();
        }
        else {
            $tickets = $this->selectTicketList()
                ->where('estado','Cerrado')
                ->paginate();
        }

        return view('tickets/list', compact('tickets','hoy'));
    }

    public function overdue()
    {
        $hoy = Carbon::now();

        if (auth()->user()->perfil != 'tecnico') {
            $tickets = $this->selectTicketList()
                ->whereRaw('estado = "Vencido" and (tickets.id in (SELECT ticket_id FROM ticket_users where user_id='.auth()->user()->id.') or tickets.user_id = '.auth()->user()->id.')')
                ->paginate();
        }
        else {
            $tickets = $this->selectTicketList()
                ->where('estado','Vencido')
                ->paginate();
        }

        return view('tickets/list', compact('tickets','hoy'));
    }

    public function details($id)
    {
        $ticket = Ticket::findOrFail($id);
        $opciones = ['Seguimiento', 'Tarea', 'Solucion']; 
        $usuarios = User::where('perfil','!=', 'usuario')->get();
        
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

        $categoria = TicketCategory::findOrFail($request->get('categoria'));
        $prioridad = $categoria->ticket_priorities_id;
        $horas = TicketPriority::findOrFail($prioridad);
        $hoy = Carbon::now();
        $vencimiento = $hoy->addHours($horas->horas);

        $ticket = \Auth::user()->tickets()->create([
            'titulo'                => $request->get('titulo'),
            'detalle'               => $request->get('cuerpoTicket'),
            'ticket_categories_id'  => $request->get('categoria'),
            'ticket_priorities_id'  => $prioridad,
            'device_id'             => 1,
            'vencimiento'           => $vencimiento,
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
        $comment->tipo_obs = '';
        $comment->responde = 0;
        $comment->comentario = 'Cambio de estado a '.$request->estado;
        $comment->user_id = \Auth::user()->id;

        $ticket->comments()->save($comment);

        session()->flash('success','Se cambio exitosamente el estado del ticket');
        return redirect()->back();

    }

    public function tareas()
    {
        if (auth()->user()->perfil != 'tecnico') {
            $tareas = TicketComment::select('ticket_id','tickets.titulo','users.apellido','users.nombre','comentario','tipo_obs')
                ->join('users', 'users.id', '=', 'ticket_comments.user_id')
                ->join('tickets', 'tickets.id', '=', 'ticket_comments.ticket_id')
                ->where('users.id','=',auth()->user()->id)
                ->where('tipo','Tarea')
                ->orderBy('ticket_comments.created_at','DESC')
                ->paginate();
        }
        else {
            $tareas = TicketComment::select('ticket_id','tickets.titulo','users.apellido','users.nombre','comentario','tipo_obs')
                ->join('users', 'users.id', '=', 'ticket_comments.user_id')
                ->join('tickets', 'tickets.id', '=', 'ticket_comments.ticket_id')
                ->where('tipo','Tarea')
                ->orderBy('ticket_comments.created_at','DESC')
                ->paginate();
        }

        return view('tickets.tareas',compact('tareas'));
    }

    public function documentos()
    {
        return 'Documentos';
    }


}