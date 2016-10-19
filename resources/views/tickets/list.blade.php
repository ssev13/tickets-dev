@extends('layouts.layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-11 col-md-offset-1">
        <h1>
            <div class="col-md-4">
                    Tickets 
                    <a href="{{ route('tickets.create')}}" class="btn btn-primary">
                        Nuevo Ticket                    
                    </a>
            </div>
            <div class="col-md-2">
            <h4>
                <span class=" label label-info news">Hay {{ $tickets->total() }} Tickets </span>
            </h4>
            </div>
        </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-11 col-md-offset-1">
            @foreach($tickets as $ticket)
                @include('tickets/partials/item', compact('ticket'))
            @endforeach
            {{ $tickets->render() }}
        </div>
    </div>
    <hr>

    <p><a href="http://www.google.com" target="_blank">Google</a></p>

</div>

@endsection