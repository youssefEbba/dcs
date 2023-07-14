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
        Schema::create('sys_groupes_traitements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('libelle', 250);
            $table->string('app', 10)->default('all')->comment('all:tout;0 dgct 1:MEDD');
            $table->boolean('is_global')->default(false);
            $table->integer('ordre')->default(1);
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
        Schema::dropIfExists('sys_groupes_traitements');
    }
};
