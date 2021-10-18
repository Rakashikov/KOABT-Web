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
            $table->foreign(['actors_ids'], 'FK_rehearsals_casts')->references(['id'])->on('casts')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['troupe_id'], 'Troupe_key')->references(['id'])->on('troupes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['type_id'], 'Type_key')->references(['id'])->on('types_of_rehearsals')->onUpdate('NO ACTION')->onDelete('NO ACTION');
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
