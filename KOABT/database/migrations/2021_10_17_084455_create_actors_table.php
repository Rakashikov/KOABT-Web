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
            $table->integer('Actor ID', true);
            $table->integer('Troupe ID')->nullable()->index('TroupeID');
            $table->integer('Position ID')->nullable()->index('PositionID');
            $table->string('Last Name', 50)->default('');
            $table->string('First Name', 50)->default('');
            $table->string('Middle Name', 50)->nullable()->default('');
            $table->text('Discription')->nullable();
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
