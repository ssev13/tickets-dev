                @if ($ticket->ticket_priorities_id == 1)
                    <span class="label label-danger">{{ $ticket->ticket_priorities->nombre }}</span>
                @elseif ($ticket->ticket_priorities_id == 2)
                    <span class="label label-warning">{{ $ticket->ticket_priorities->nombre }}</span>
                @elseif ($ticket->ticket_priorities_id == 3)
                    <span class="label label-success">{{ $ticket->ticket_priorities->nombre }}</span>
                @elseif ($ticket->ticket_priorities_id == 4)
                    <span class="label label-info">{{ $ticket->ticket_priorities->nombre }}</span>
                @else
                    <span class="label label-default">{{ $ticket->ticket_priorities->nombre }}</span>                 
                @endif