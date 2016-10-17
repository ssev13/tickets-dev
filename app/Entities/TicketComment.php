<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class TicketComment extends Model
{

	protected $fillable=['tipo','comentario','responde'];

	public function ticket()
	{
		return $this->belongsTo(Ticket::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

}
