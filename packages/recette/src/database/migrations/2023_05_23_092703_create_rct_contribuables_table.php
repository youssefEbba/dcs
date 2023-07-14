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
        Schema::create('rct_contribuables', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('activite_id')->index('activite_id');
            $table->integer('ref_emplacement_activite_id');
            $table->integer('ref_taille_activite_id')->index('ref_taille_activite_id');
            $table->string('libelle', 100);
            $table->string('libelle_ar', 100)->nullable();
            $table->string('representant', 100)->nullable();
            $table->string('adresse', 100)->nullable();
            $table->string('telephone', 40)->nullable();
            $table->decimal('montant', 10, 0)->default(0);
            $table->date('date_mas')->nullable();
            $table->integer('etat')->nullable()->default(0)->comment('0:active ,1:desactive, 2:suspendu');
            $table->integer('ref_commune_id')->nullable()->default(1);
            $table->timestamps();
            $table->softDeletes();

            $table->index(['ref_emplacement_activite_id', 'ref_taille_activite_id'], 'ref_emplacement_activite_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rct_contribuables');
    }
};
