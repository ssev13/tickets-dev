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

	                	@if (like_match('image%',$entry->mime))
	                		<a href="{{ route('filemanager.get', $entry->filename) }}">
		                    	<img src="{{route('filemanager.get', $entry->filename)}}" alt="ALT NAME" class="img-responsive" />
		                    </a>
		                @else
	                		<a href="{{ route('filemanager.get', $entry->filename) }}">
			                    <img src="{{url('img/documentos.png')}}" alt="ALT NAME" class="img-responsive" />
		                    </a>
		                @endif
{{--
		                    <img src="{{route('getfile', $entry->filename)}}" alt="ALT NAME" class="img-responsive" />
--}}
	                    <div class="caption">
	                        <p><a href="{{ route('filemanager.get', $entry->filename) }}">{{$entry->original_filename}}</a></p>
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