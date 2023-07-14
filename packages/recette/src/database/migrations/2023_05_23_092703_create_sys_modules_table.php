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
        Schema::create('sys_modules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('libelle');
            $table->string('libelle_ar');
            $table->string('is_extern')->default('0');
            $table->string('link');
            $table->string('icon');
            $table->string('bg_color')->default('#858796');
            $table->string('text_color')->default('#ffffff');
            $table->string('sub_nav_active');
            $table->unsignedBigInteger('sys_groupes_traitement_id');
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
        Schema::dropIfExists('sys_modules');
    }
};
