<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToActorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('actors', function (Blueprint $table) {
            $table->foreign(['position_id'], 'PositionID')->references(['id'])->on('positions')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['troupe_id'], 'TroupeID')->references(['id'])->on('troupes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('actors', function (Blueprint $table) {
            $table->dropForeign('PositionID');
            $table->dropForeign('TroupeID');
        });
    }
}
