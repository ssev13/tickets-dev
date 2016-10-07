                @if ($ticket->open)
                    <span class="label label-info absolute highlight">{{ $ticket->estado }}</span>
                @else
                    <span class="label label-info absolute">{{ $ticket->estado }}</span>
                @endif

