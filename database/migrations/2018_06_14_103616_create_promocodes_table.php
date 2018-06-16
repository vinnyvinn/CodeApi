<?php
use App\Promocode;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromocodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promocodes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('radius');
            $table->integer('user_id')->unsigned();
            $table->string('status')->default(Promocode::CODE_INACTIVE);
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users');
            
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promocodes');
    }
}
