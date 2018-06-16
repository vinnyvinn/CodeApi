<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;
use App\Promocode;
use App\Ride;
class Promocode extends Model
{
	const CODE_ACTIVE = 'active';
	const CODE_INACTIVE = 'inactive';
    protected $fillable=[
        'code',
        'radius',
        'status',
        'user_id',
        'ride_id'
    ];
    protected $table = 'promocodes';
    public function isActive(){
        return $this->status == Promocode::CODE_ACTIVE;
    }

    public function events(){
       return $this->belongsToMany(Event::class);
   }
   public function rides(){
       return $this->hasMany(Ride::class);
   }

   public function user(){
    return $this->belongsTo(User::class);
}

}
