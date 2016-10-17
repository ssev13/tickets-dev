@extends('layouts.layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="row">
                <h1>
                    Tickets 
                    <a href="{{ route('tickets.create')}}" class="btn btn-primary">
                        Nuevo Ticket                    </a>
                </h1>

                <p class="label label-info news">
                    Hay {{ $tickets->total() }} Tickets                </p>

                @foreach($tickets as $ticket)
                    @include('tickets/partials/item', compact('ticket'))
                @endforeach

                {{ $tickets->render() }}
                
            </div>

            <hr>

            <p><a href="http://www.google.com" target="_blank">Google</a></p>

        </div>
    </div>
</div>

@endsection