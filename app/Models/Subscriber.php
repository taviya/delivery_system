<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
	protected $guarded = [];
	protected $dates = [
		'created_at',
		'updated_at',
	]; 
}
