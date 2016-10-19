<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class TicketPriority extends Model
{
    protected $fillable = ['nombre', 'detalle', 'horas'];

}
