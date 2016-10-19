<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class TicketCategory extends Model
{

    protected $guarded = ['id'];

    protected $fillable = ['nombre', 'detalle', 'estado', 'parent_id'];

    public function parent()
    {
        return $this->belongsTo(TicketCategory::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(TicketCategory::class, 'parent_id');
    }

    public function prioridad()
    {
        return $this->hasOne(TicketPriority::class);
    }


}
