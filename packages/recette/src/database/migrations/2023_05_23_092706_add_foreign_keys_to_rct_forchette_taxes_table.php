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
        Schema::table('rct_forchette_taxes', function (Blueprint $table) {
            $table->foreign(['ref_categorie_activite_id'], 'rct_forchette_taxes_ibfk_1')->references(['id'])->on('rct_categorie_activites')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['ref_emplacement_activite_id'], 'rct_forchette_taxes_ibfk_2')->references(['id'])->on('rct_emplacement_activites')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['ref_taille_activite_id'], 'rct_forchette_taxes_ibfk_3')->references(['id'])->on('rct_taille_activites')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rct_forchette_taxes', function (Blueprint $table) {
            $table->dropForeign('rct_forchette_taxes_ibfk_1');
            $table->dropForeign('rct_forchette_taxes_ibfk_2');
            $table->dropForeign('rct_forchette_taxes_ibfk_3');
        });
    }
};
