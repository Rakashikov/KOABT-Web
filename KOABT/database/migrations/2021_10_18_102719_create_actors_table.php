<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actors', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('troupe_id')->nullable()->index('TroupeID');
            $table->integer('position_id')->nullable()->index('PositionID');
            $table->string('last_name', 50)->default('');
            $table->string('first_name', 50)->default('');
            $table->string('middle_name', 50)->nullable()->default('');
            $table->text('discription')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actors');
    }
}
