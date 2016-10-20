                <div data-id="25" class="well well-sm request">

                    <h4 class="list-title">
                        <div class="row">
                          <div class="col-md-8">
                            <a href="{{ route('tickets.details', $ticket) }}">
                                {{ $ticket->titulo }}
                            </a>
                          </div>
                            <h5>
                              <div class="col-md-1" align="left">
                                @include('tickets.partials.prioridad', compact($ticket))
                              </div>
                              <div class="col-md-1" align="right">
                                @include('tickets.partials.estado', compact($ticket))
                              </div>
                              <div class="col-md-2" align="right">
                                @include('tickets.partials.vencimiento', compact($ticket,$hoy))
                              </div>
                            </h5>
                        </div>                    
                    </h4>

                    <p>

                        <span class="label label-success news">{{ $ticket->categoria }}</span>
                        <span class="comments-count"> - {{ $ticket->num_encargados }} encargados</span>.
                        <span class="comments-count"> - {{ $ticket->num_comments }} comentarios</span>.

                       <p class="date-t"><span class="glyphicon glyphicon-time"></span>{{ $ticket->created_at->format('d/m/Y H:m') }}
                       por {{ $ticket->user->nombreCompleto }}</p>
                    </p>
                </div> 