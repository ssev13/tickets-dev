<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

	public function comments()
	{
		return $this->hasMany(TicketComment::class);
	}

	public function author()
	{
		return $this->belongsTo(User::class);
	}

	public function category()
	{
		return $this->belongsTo(TicketCategory::class);
	}

	public function getOpenAttribute()
	{
		return $this->estado == 'Abierto';
	}
}
