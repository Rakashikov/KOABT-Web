<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPlaybillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('playbill', function (Blueprint $table) {
            $table->foreign(['Cast ID'], 'Cast')->references(['ID'])->on('casts')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['Event ID'], 'Events')->references(['Event ID'])->on('events')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('playbill', function (Blueprint $table) {
            $table->dropForeign('Cast');
            $table->dropForeign('Events');
        });
    }
}
