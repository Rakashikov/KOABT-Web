<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToActorRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('actor_roles', function (Blueprint $table) {
            $table->foreign(['Actor ID'], 'Actor ID')->references(['Actor ID'])->on('actors')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['Role ID'], 'Roles')->references(['Role ID'])->on('roles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('actor_roles', function (Blueprint $table) {
            $table->dropForeign('Actor ID');
            $table->dropForeign('Roles');
        });
    }
}
