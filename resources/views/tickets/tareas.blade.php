@extends('layouts.layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

        	<h1>Tareas</h1>

        	@include('tickets/partials/errors')

			    <table class="table table-bordered">
				    <div class="row">
			            @foreach($tareas as $tarea)
					        <div class="col-md-11 col-md-offset-1">
					        	<div class="col-md-6">
		                            <a href="{{ route('tickets.details', $tarea->ticket_id) }}">
		                                {{ $tarea->titulo }}
		                            </a>
	                            </div>
				            	<div class="col-md-5"><span class="badge">{{ $tarea->apellido }}, {{ $tarea->nombre }}</span></div><br>
				            </div>
					        <div class="col-md-11 col-md-offset-1">
				            	<div class="col-md-11">{{ $tarea->comentario }}</div>
					        </div>
			            @endforeach
			            {{ $tareas->render() }}
				    </div>			    
			    </table>

        </div>
    </div>
</div>

@endsection