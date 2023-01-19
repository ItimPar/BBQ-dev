<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jobtable extends Model
{
    use HasFactory;

	protected $fillable = [
		'queue_id','user_id','barber_id','title', 'start', 'end'
	];
}
