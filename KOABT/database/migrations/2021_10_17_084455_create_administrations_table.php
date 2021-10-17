<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrations', function (Blueprint $table) {
            $table->integer('ID', true);
            $table->integer('Position')->index('Positions');
            $table->string('First name', 50);
            $table->string('Middle name', 50)->nullable();
            $table->string('Last name', 50);
            $table->string('Phone', 50)->nullable();
            $table->string('e-mail', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('administrations');
    }
}
