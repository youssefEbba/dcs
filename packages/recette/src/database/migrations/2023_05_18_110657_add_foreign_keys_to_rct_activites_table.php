<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rct_activites', function (Blueprint $table) {
            $table->foreign(['ref_categorie_activite_id'], 'rct_activites_ibfk_1')->references(['id'])->on('rct_ref_categorie_activites')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rct_activites', function (Blueprint $table) {
            $table->dropForeign('rct_activites_ibfk_1');
        });
    }
};
