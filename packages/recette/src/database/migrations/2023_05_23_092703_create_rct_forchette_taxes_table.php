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
        Schema::create('rct_forchette_taxes', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('ref_emplacement_activite_id');
            $table->integer('ref_taille_activite_id')->index('ref_taille_activite_id');
            $table->integer('ref_categorie_activite_id')->index('ref_categorie_activite_id');
            $table->decimal('montant', 10, 0)->nullable();
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
        Schema::dropIfExists('rct_forchette_taxes');
    }
};
