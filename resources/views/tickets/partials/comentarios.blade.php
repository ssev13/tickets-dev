                    <p> @include('tickets.partials.commentType', compact($comment)) </p>
                    <p><strong>{{ $comment->user->apellido }}, {{ $comment->user->nombre }}</strong></p>
                    <p>{{ $comment->comentario }}</p>
                    <p class="date-t"><span class="glyphicon glyphicon-time"></span> 
                    {{ $comment->created_at->format('d/m/Y H:m') }} </p>
                    <hr>