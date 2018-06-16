<?php
use App\User;
use App\Event;
use App\Ride;
use App\Promocode;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::statement('SET FOREIGN_KEY_CHECKS = 0');

    	User::truncate();
    	Ride::truncate();
    	Event::truncate();
    	Promocode::truncate();

    	DB::table('event_promocode')->truncate();

    	$usersQuantity=200;
    	$ridesQuantity=1000;
    	$eventssQuantity=600;
    	$codesQuantity=1000;
        
        factory(User::class,$usersQuantity)->create();
        factory(Promocode::class,$codesQuantity)->create();
        factory(Ride::class,$ridesQuantity)->create();
        factory(Event::class,$eventssQuantity)->create()->each(
            function($code){
                $promocodes = Promocode::all()->random(mt_rand(1,5))->pluck('id');

                $code->codes()->attach($promocodes);
            });

        
        

    }
}
