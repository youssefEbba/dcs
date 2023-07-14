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
        Schema::create('ref_communes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('libelle_fr', 120)->nullable();
            $table->string('libelle_ar', 120)->nullable();
            $table->string('code');
            $table->integer('surface')->default(0);
            $table->integer('nbr_habitants')->default(0);
            $table->unsignedBigInteger('ref_moughataa_id');
            $table->string('nom_Maire');
            $table->string('nom_SG');
            $table->integer('nbr_villages_localites')->nullable();
            $table->string('decret_de_creation')->nullable();
            $table->integer('nbr_conseillers_municipaux')->nullable();
            $table->integer('nbr_employes_municipaux_permanents')->nullable();
            $table->integer('nbr_employes_municipaux_temporaires')->nullable();
            $table->string('path_carte')->nullable();
            $table->integer('ordre')->default(1);
            $table->boolean('is_display')->default(true);
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
        Schema::dropIfExists('ref_communes');
    }
};
