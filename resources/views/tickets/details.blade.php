@extends('layouts.layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h2 class="title-show">
                {{ $ticket->titulo }}

                @include('tickets.partials.estado', compact($ticket))

            </h2>

            <h3 class="title-show">
                {{ $ticket->detalle }}
            </h3>
            <h4 class="label label-info news">
                Autor {{ $ticket->user->nombreCompleto }}
            </h4>

            <h4 class="label label-info news">
                Categoria {{ $ticket->ticket_categories->nombre }}
            </h4>

            <form method="POST" action="http://tickets.app/votar/5" accept-charset="UTF-8"><input name="_token" type="hidden" value="VBIv3EWDAIQuLRW0cGwNQ4OsDKoRhnK2fAEF6UbQ">
                <!--button type="submit" class="btn btn-primary">Votar</button-->
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-thumbs-up"></span> Votar
                </button>
            </form>

            <h3>Nuevo Comentario</h3>

            <form method="POST" action=" {{ url('comentar') }}">
{{--            <form method="POST" action="http://tickets.app/comentar/5" accept-charset="UTF-8"><input name="_token" type="hidden" value="VBIv3EWDAIQuLRW0cGwNQ4OsDKoRhnK2fAEF6UbQ">
--}}
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="comment">Comentarios:</label>
                    <textarea rows="4" class="form-control" name="comment" cols="50" id="comment">{{ old('cuerpoTicket') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="link">Enlace:</label>
                    <input class="form-control" name="link" type="text" id="link">
                </div>
                <button type="submit" class="btn btn-primary">Enviar comentario</button>
            </form>

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

