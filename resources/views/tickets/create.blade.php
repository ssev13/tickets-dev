@extends('layouts.layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

        	@include('tickets/partials/errors')

			<form method="POST" action=" {{ url('solicitar') }}">
			    {!! csrf_field() !!}

				<div class="form-group">Categoría
					<select class="form-control" name='categoria'>
					  @foreach($categories as $category)
						  	<option value='{{ $category->id }}'>{{ $category->nombre }}</option>

					  		@foreach ($category->children as $children)
						  		<option value='{{ $children->id }}'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $children->nombre }}</option>
					  		@endforeach

					  @endforeach
					</select>			    
				</div>

				<div class="form-group">
					<label for="titulo">Titulo</label>
					<input name='titulo' type="text" class="form-control" id="titulo" placeholder="Titulo del Ticket" value={{ old('titulo') }}>
				</div>
				<div class="form-group">
					<label for="cuerpoTicket">Ticket</label>
					<textarea name='cuerpoTicket' class="form-control" id="cuerpoTicket" rows="5">{{ old('cuerpoTicket') }}</textarea>
				</div>
{{--
				<div class="form-group">
					<label for="exampleInputFile">Adjuntar archivo</label>
					<input type="file" id="exampleInputFile">
					<p class="help-block">Lista de adjuntos.</p>
				</div>
--}}
				<button type="submit" class="btn btn-default">Enviar</button>
			</form>
        </div>
    </div>
</div>

@endsection