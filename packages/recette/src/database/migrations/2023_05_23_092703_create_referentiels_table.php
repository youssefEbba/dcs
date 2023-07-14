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
        Schema::create('referentiels', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('libelle_fr', 120)->nullable();
            $table->string('libelle_ar', 120)->nullable();
            $table->string('model', 30);
            $table->string('path_model', 80);
            $table->string('titre_fr', 180);
            $table->string('titre_ar', 80)->nullable();
            $table->string('titre_ajout_fr')->nullable();
            $table->string('titre_ajout_ar')->nullable();
            $table->integer('champ_sup')->nullable()->default(0)->comment('champ suplementaire 1:oui 0:non');
            $table->integer('nature_champ')->nullable()->comment('nature champ 1:numerique,2:boolean,3:champ table');
            $table->string('model_table')->nullable()->comment('model champ table');
            $table->string('path_model_table')->nullable()->comment('path model champ table');
            $table->string('name_champ', 55)->nullable()->comment('name champ d\'une table referentiel');
            $table->string('champ_table_affiche', 150)->nullable()->comment('nom champ table affichier');
            $table->string('titre_champ_fr', 100)->nullable();
            $table->string('titre_champ_ar', 100)->nullable();
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
        Schema::dropIfExists('referentiels');
    }
};
