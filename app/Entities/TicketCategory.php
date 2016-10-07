<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class TicketCategory extends Model
{

    public function tickets()
    {
    	return $this->hasMany(Ticket::class);
    }

/*
    protected $fillable = [
        'nombre', 'detalle', 'estado', 'parent_id',
    ];
*/
}
