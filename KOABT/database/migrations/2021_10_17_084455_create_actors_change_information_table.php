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
            $table->dateTime('DataAndTime');
            $table->string('User', 50)->default('');
            $table->string('Changed Value', 50)->default('');
            $table->text('Old Value');
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
