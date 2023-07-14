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
        Schema::create('rct_activites', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('ref_categorie_activite_id')->index('ref_categorie_activite_id');
            $table->string('libelle', 100);
            $table->string('libelle_ar', 100);
            $table->integer('ref_commune_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rct_activites');
    }
};
