                    <p> @include('tickets.partials.commentType', compact($comment)) </p>
                    <p><strong>{{ $comment->user->nombreCompleto }}</strong></p>
                    <p>{{ $comment->comentario }}</p>
                    <p class="date-t"><span class="glyphicon glyphicon-time"></span> 
                    {{ $comment->created_at->format('d/m/Y H:m') }} </p>
                    <hr>