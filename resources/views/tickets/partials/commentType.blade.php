                @if ($comment->tipo == 'Seguimiento')
                    <span class="label label-info">{{ $comment->tipo }}</span>
                @elseif ($comment->tipo == 'Tarea')
                    <span class="label label-warning">{{ $comment->tipo }}</span>
                @elseif ($comment->tipo == 'Documento')
                    <span class="label label-primary">{{ $comment->tipo }}</span>
                @else
                    <span class="label label-success">{{ $comment->tipo }}</span>                 
                @endif