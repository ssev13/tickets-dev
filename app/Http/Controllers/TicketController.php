<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TicketController extends Controller
{
    public function latest()
    {
        dd('latest');
    }

    public function opened()
    {
        dd('opened');
    }

    public function closed()
    {
        dd('closed');
    }

    public function popular()
    {
        dd('popular');
    }

}
