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
        Schema::create('gd_types_geds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom_objet')->nullable();
            $table->string('libelle_fr')->nullable();
            $table->string('libelle_ar')->nullable();
            $table->string('modele')->nullable();
            $table->string('path_model')->nullable();
            $table->string('titre')->nullable();
            $table->string('titre_ar')->nullable();
            $table->string('sys_groupes_traitements')->nullable();
            $table->boolean('is_global')->default(false);
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
        Schema::dropIfExists('gd_types_geds');
    }
};
