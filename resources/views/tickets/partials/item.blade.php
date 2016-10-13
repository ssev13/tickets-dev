                <div data-id="25" class="well well-sm request">
                    <h4 class="list-title">
                        <a href="{{ route('tickets.details', $ticket) }}">
                            {{ $ticket->titulo }}
                        </a>

                        @include('tickets.partials.estado', compact($ticket))

                    </h4>
                    <p>
                    {{--
                        <a href="#" class="btn btn-primary btn-vote" title="Votar por este tutorial">
                            <span class="glyphicon glyphicon-thumbs-up"></span> Votar
                        </a>

                        <a href="#" class="btn btn-hight btn-unvote hide">
                            <span class="glyphicon glyphicon-thumbs-down"></span> No votar
                        </a>
					--}}
                        
                            <span class="label label-info news">{{ $ticket->ticket_categories->nombre }} </span>
                            - <span class="comments-count">{{ $ticket->comments->count() }} comentarios</span>.

                    <p class="date-t"><span class="glyphicon glyphicon-time"></span>{{ $ticket->created_at->format('d/m/Y H:m') }}</p>
                    </p>
                </div> 