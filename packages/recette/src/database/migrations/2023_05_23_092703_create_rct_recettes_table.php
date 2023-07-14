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
        Schema::create('rct_recettes', function (Blueprint $table) {
            $table->integer('id', true);
            $table->text('description')->nullable();
            $table->string('annee', 4);
            $table->integer('ref_type_recette_id');
            $table->integer('nomenclature_element_id')->index('nomenclature_element_id');
            $table->date('date');
            $table->decimal('montant', 20, 0)->nullable();
            $table->integer('user_id')->index('user_id');
            $table->string('ged', 100);
            $table->text('origine')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['ref_type_recette_id', 'nomenclature_element_id', 'user_id'], 'ref_type_recette_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rct_recettes');
    }
};
