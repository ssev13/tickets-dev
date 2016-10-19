<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','email','password','nombre', 'apellido', 'perfil', 'dominio', 'locacion'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password','remember_token'
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function ticketsACargo()
    {
        return $this->belongsToMany(Ticket::class,'ticket_users')->withTimeStamps();
    }

    public function comments()
    {
        return $this->hasMany(TicketComment::class);
    }

    public function getNombreCompletoAttribute()
    {
        return $this->apellido.', '.$this->nombre;
    }

    public function encargado(Ticket $ticket)
    {
        return $this->ticketsACargo()->where('ticket_id',$ticket->id)->count();
    }

    public function asignar($ticket)
    {
        if ($this->encargado($ticket)) return false;

        $this->ticketsACargo()->attach($ticket);

        return true;
    }

    public function desasignar($ticket)
    {
        $this->ticketsACargo()->detach($ticket);
    }
}
