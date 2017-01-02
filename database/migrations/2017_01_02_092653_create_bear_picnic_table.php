<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBearPicnicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bear_picnic', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('bear_id'); // the id of the bear
             $table->integer('picnic_id'); // the id of the picnic that this bear is at
             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('bear_picnic');
    }
}
