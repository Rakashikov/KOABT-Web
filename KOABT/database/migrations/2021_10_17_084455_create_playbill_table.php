<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaybillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playbill', function (Blueprint $table) {
            $table->dateTime('DateAndTime');
            $table->integer('Event ID')->index('Events_spec');
            $table->integer('Cast ID')->nullable()->index('Cast');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('playbill');
    }
}
