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

            <h3 class="title-show">
                {{ $ticket->detalle }}
            </h3>
            <h4 class="label label-info news">
                Autor {{ $ticket->user->nombreCompleto }}
            </h4>

            <h4 class="label label-info news">
                Categoria {{ $ticket->ticket_categories->nombre }}
            </h4>
{{--
            <form method="POST" action="http://tickets.app/votar/5" accept-charset="UTF-8">
                <!-- input name="_token" type="hidden" value="VBIv3EWDAIQuLRW0cGwNQ4OsDKoRhnK2fAEF6UbQ" -->
                <!-- button type="submit" class="btn btn-primary">Votar</button -->
                {!! csrf_field() !!}
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-thumbs-up"></span> Votar
                </button>
            </form>
--}}
            <form method="POST" action=" {{ url('cambioEstado', $ticket) }}" accept-charset="UTF-8">
                {!! csrf_field() !!}
                <div class="form-group">
                    <select class="form-control" name='estado'>
                        <option value='Pendiente'>Pendiente</option>
                        <option value='Abierto'>Abierto</option>
                        <option value='Vencido'>Vencido</option>
                        <option value='Cerrado'>Cerrado</option>                        
                    </select>               
                </div>

                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-edit"></span> Cambiar Estado
                </button>
            </form>

            @unless($ticket->estado == 'Cerrado')
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

