<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
	protected $fillable=['nombre','detalle','ip_address','mac_address'];

}
