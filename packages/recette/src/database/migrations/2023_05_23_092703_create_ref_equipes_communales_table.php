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
        Schema::create('ref_equipes_communales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('libelle_fr');
            $table->string('libelle_ar')->nullable();
            $table->unsignedBigInteger('ref_commune_id')->nullable();
            $table->unsignedBigInteger('ref_type_equipes_communale_id');
            $table->integer('signature')->default(1);
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
        Schema::dropIfExists('ref_equipes_communales');
    }
};
