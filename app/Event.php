<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Promocode;
class Event extends Model
{
    protected $fillable=[
    	'name',
    	'description',
    	'promocode_id',

    ];

    public function codes(){
    	return $this->belongsToMany(Promocode::class);
    }

   
}
