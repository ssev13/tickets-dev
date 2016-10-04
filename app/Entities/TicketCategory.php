<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class TicketCategory extends Model
{
    protected $fillable = [
        'nombre', 'detalle', 'estado', 'parent_id',
    ];
}
