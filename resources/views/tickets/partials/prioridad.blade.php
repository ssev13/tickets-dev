                @if ($ticket->ticket_priorities_id == 1)
                    <span class="label label-danger">{{ $ticket->prioridad }}</span>
                @elseif ($ticket->ticket_priorities_id == 2)
                    <span class="label label-warning">{{ $ticket->prioridad }}</span>
                @elseif ($ticket->ticket_priorities_id == 3)
                    <span class="label label-success">{{ $ticket->prioridad }}</span>
                @elseif ($ticket->ticket_priorities_id == 4)
                    <span class="label label-info">{{ $ticket->prioridad }}</span>
                @else
                    <span class="label label-default">{{ $ticket->prioridad }}</span>                 
                @endif