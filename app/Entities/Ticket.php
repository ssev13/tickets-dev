<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

	protected $fillable=['titulo','detalle','estado','ticket_categories_id'];

	public function comments()
	{
		return $this->hasMany(TicketComment::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

/*
	public function author()
	{
		return $this->belongsTo(User::class,'user_id');
	}
*/

	public function ticket_categories()
	{
		return $this->belongsTo(TicketCategory::class);
	}

	public function getOpenAttribute()
	{
		return $this->estado == 'Abierto';
	}

}
