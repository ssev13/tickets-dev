@extends('layouts.layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
			 <h1> Archivos subidos </h1>
			 
			 <div class="row">
			 
			    <ul>
			 @foreach($entries as $entry)
	            <div class="col-md-2">
	                <div class="thumbnail">
	                    <img src="{{route('filemanager.get', $entry->filename)}}" alt="ALT NAME" class="img-responsive" />
	                    <div class="caption">
	                        <p>{{$entry->original_filename}}</p>
	                    </div>
	                </div>
	            </div>
			 @endforeach
			    </ul>
			 </div>


        </div>
    </div>
</div>

@endsection