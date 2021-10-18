<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActorsChangeInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actors_change_information', function (Blueprint $table) {
            $table->dateTime('date_and_time');
            $table->string('user', 50)->default('');
            $table->string('changed_value', 50)->default('');
            $table->text('old_value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actors_change_information');
    }
}
