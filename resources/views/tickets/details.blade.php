@extends('layouts.layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h2 class="title-show">
                {{ $ticket->titulo }}

                @include('tickets.partials.estado', compact($ticket))
                
            </h2>

            @if (Session::has('success'))
                <div class='alert alert-success'>
                    {{ Session::get('success') }}
                </div>
            @endif

            <h3 class="label label-info">
                Vencimiento {{ $ticket->vencimiento }}
            </h3>
            <h3 class="title-show">
                {{ $ticket->detalle }}
            </h3>
            <h4 class="label label-info news">
                Autor {{ $ticket->user->nombreCompleto /* $ticket->user->apellido.', '.$ticket->user->nombre */ }}
            </h4>

            <h4 class="label label-success news">
                Categoria {{ $ticket->ticket_categories->nombre }}
            </h4>

            <p class="vote-users">
                @foreach($ticket->encargados as $encargado)
                    {!! Form::open(['route' => ['encargados.destroy', $ticket->id, $encargado->id], 'method' => 'DELETE']) !!}
                        {!! csrf_field() !!}
                        <button type="submit" class="label label-info">
                            {{ $encargado->apellido.', '.$encargado->nombre }}
                        </button>
                    {!! Form::close() !!}
                @endforeach
            </p>
            @if (Auth::user()->perfil != 'usuario')
                <?php $clase = ''  ?>
            @else
                <?php $clase = ' hidden'  ?>
            @endif
            {!! Form::open(['route' => ['encargados.submit', $ticket->id], 'method' => 'POST']) !!}
                {!! csrf_field() !!}
                <div class="form-group {{ $clase }}" >
                    <select class="form-control" name='usuarioNuevo'>
                        @foreach($usuarios as $usuario)
                            {{ $yaesta = false }}
                            @foreach($ticket->encargados as $encargado)
                                @if($encargado->id == $usuario->id)
                                    {{ $yaesta = true }}                                    
                                @endif
                            @endforeach
                            @if(! $yaesta)
                                <option value='{{ $usuario->id }}'> {{ $usuario->apellido.', '.$usuario->nombre }} </option>
                            @endif
                        @endforeach
                    </select>               
                </div>

                <button type="submit" class="btn btn-primary {{ $clase }}">
                    <span class="glyphicon glyphicon-user"></span> Asignar Técnico
                </button>
            {!! Form::close() !!}
            <br>
            <form method="POST" action=" {{ url('cambioEstado', $ticket) }}" accept-charset="UTF-8">
                {!! csrf_field() !!}
                <div class="form-group  {{ $clase }}">
                    <select class="form-control" name='estado'>
                        <option value='Pendiente'>Pendiente</option>
                        <option value='Abierto'>Abierto</option>
                        <option value='Vencido'>Vencido</option>
                        <option value='Cerrado'>Cerrado</option>                        
                    </select>               
                </div>

                <button type="submit" class="btn btn-primary {{ $clase }}">
                    <span class="glyphicon glyphicon-edit"></span> Cambiar Estado
                </button>
            </form>

            @unless($ticket->estado == 'Cerrado')
                @include('tickets.partials.commentUploadfile')
                @include('tickets.partials.commentNew', compact($opciones))
            @endunless

            <h3>Comentarios ({{ $ticket->comments->count() }})</h3>

            <div class="well well-sm">
                @foreach($ticket->comments as $comment)
                    @include('tickets/partials/comentarios', compact('comment'))
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

