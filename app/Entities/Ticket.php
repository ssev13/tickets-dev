<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

	protected $fillable=['titulo','detalle','estado','ticket_categories_id','ticket_priorities_id','vencimiento','device_id'];

	public function comments()
	{
		return $this->hasMany(TicketComment::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function encargados()
	{
		return $this->belongsToMany(User::class,'ticket_users')->withTimeStamps();
	}

    public function usuariosacargo(User $user)
    {
        return $this->encargados()->count();
    }

	public function ticket_categories()
	{
		return $this->belongsTo(TicketCategory::class);
	}

	public function ticket_priorities()
	{
		return $this->belongsTo(TicketPriority::class);
	}

	public function getOpenAttribute()
	{
		return $this->estado == 'Abierto';
	}

}
