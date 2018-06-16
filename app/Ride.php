<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Promocode;
class Ride extends Model
{
	protected $fillable = [
		'name',
		'description',
		'amount',
	];

	public function code(){
		return $this->belongsTo(Promocode::class);
	}
}

