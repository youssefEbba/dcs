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
        Schema::create('rct_emplacement_activites', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('libelle', 100);
            $table->string('libelle_ar', 100);
            $table->integer('ref_commune_id')->default(1);
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
        Schema::dropIfExists('rct_emplacement_activites');
    }
};
