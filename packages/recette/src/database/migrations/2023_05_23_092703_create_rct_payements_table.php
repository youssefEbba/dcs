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
        Schema::create('rct_payements', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('libelle', 100);
            $table->string('libelle_ar', 100)->nullable();
            $table->string('annee', 4);
            $table->integer('mois_id');
            $table->integer('contribuable_id')->index('contribuable_id');
            $table->integer('etat')->comment('1:paye 2:avance ,3:suspendre');
            $table->decimal('montant', 10, 0);
            $table->date('date');
            $table->decimal('montant_arriere', 10, 0);
            $table->integer('ref_commune_id');
            $table->timestamps();
            $table->softDeletes();

            $table->index(['mois_id', 'contribuable_id'], 'mois_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rct_payements');
    }
};
