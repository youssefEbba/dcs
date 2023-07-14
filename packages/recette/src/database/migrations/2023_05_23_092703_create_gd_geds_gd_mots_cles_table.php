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
        Schema::create('gd_geds_gd_mots_cles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('gd_ged_id');
            $table->unsignedBigInteger('gd_mot_cle_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gd_geds_gd_mots_cles');
    }
};
