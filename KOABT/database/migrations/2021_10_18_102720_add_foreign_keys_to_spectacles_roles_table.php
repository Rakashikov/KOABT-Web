<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSpectaclesRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('spectacles_roles', function (Blueprint $table) {
            $table->foreign(['role_id'], 'RolesIDS')->references(['id'])->on('roles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['spectacle_id'], 'Spectacles')->references(['id'])->on('events')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('spectacles_roles', function (Blueprint $table) {
            $table->dropForeign('RolesIDS');
            $table->dropForeign('Spectacles');
        });
    }
}
