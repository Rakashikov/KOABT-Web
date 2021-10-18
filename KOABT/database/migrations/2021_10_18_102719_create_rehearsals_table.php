<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRehearsalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rehearsals', function (Blueprint $table) {
            $table->dateTime('date_and_time');
            $table->integer('type_id')->index('Type_key');
            $table->integer('troupe_id')->index('Troupe_key');
            $table->integer('actors_ids')->index('FK_rehearsals_casts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rehearsals');
    }
}
