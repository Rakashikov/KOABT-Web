<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('casts', function (Blueprint $table) {
            $table->foreign(['aroles_id'], 'Aroles')->references(['id'])->on('actor_roles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['spectacles_id'], 'SpectaclesID')->references(['id'])->on('events')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('casts', function (Blueprint $table) {
            $table->dropForeign('Aroles');
            $table->dropForeign('SpectaclesID');
        });
    }
}
