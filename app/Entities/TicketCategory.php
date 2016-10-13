<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class TicketCategory extends Model
{

    public function tickets()
    {
    	return $this->hasMany(Ticket::class);
    }

	// TicketCategory model
	// loads only direct children - 1 level
	public function children()
	{
	   return $this->hasMany('TicketCategory', 'parent_id');
	}

	// recursive, loads all descendants
	public function childrenRecursive()
	{
	   return $this->children()->with('childrenRecursive');
	   // which is equivalent to:
	   // return $this->hasMany('Survey', 'parent')->with('childrenRecursive);
	}

	// parent
	public function parent()
	{
	   return $this->belongsTo('TicketCategory','parent_id');
	}

	// all ascendants
	public function parentRecursive()
	{
	   return $this->parent()->with('parentRecursive');
	}


/*
    protected $fillable = [
        'nombre', 'detalle', 'estado', 'parent_id',
    ];
*/
}
