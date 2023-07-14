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
        Schema::create('ref_localites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('libelle', 120);
            $table->string('libelle_ar', 180);
            $table->string('coordonnees_gps', 120);
            $table->unsignedBigInteger('ref_commune_id');
            $table->integer('surface')->nullable();
            $table->integer('population')->nullable();
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
        Schema::dropIfExists('ref_localites');
    }
};
