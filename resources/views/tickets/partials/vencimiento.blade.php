                @if ($ticket->vencimiento > date('now'))
                    <span class="label label-info">{{ $ticket->vencimiento }}</span>
                @else
                    <span class="label label-danger">{{ $ticket->vencimiento }}</span>
                @endif