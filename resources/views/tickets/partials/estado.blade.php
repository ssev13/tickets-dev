                @if ($ticket->estado == 'Abierto')
                    <span class="label label-warning">{{ $ticket->estado }}</span>
                @elseif ($ticket->estado == 'Pendiente')
                    <span class="label label-info">{{ $ticket->estado }}</span>
                @elseif ($ticket->estado == 'Vencido')
                    <span class="label label-danger">{{ $ticket->estado }}</span>
                @else
                    <span class="label label-success">{{ $ticket->estado }}</span>                 
                @endif