<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRehearsalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rehearsals', function (Blueprint $table) {
            $table->foreign(['Actors IDs'], 'FK_rehearsals_casts')->references(['ID'])->on('casts')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['Troupe'], 'Troupe_key')->references(['ID'])->on('troupes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['Type'], 'Type_key')->references(['ID'])->on('types_of_rehearsals')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rehearsals', function (Blueprint $table) {
            $table->dropForeign('FK_rehearsals_casts');
            $table->dropForeign('Troupe_key');
            $table->dropForeign('Type_key');
        });
    }
}
