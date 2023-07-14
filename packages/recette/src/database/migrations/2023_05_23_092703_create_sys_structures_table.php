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
        Schema::create('sys_structures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('libelle_fr')->nullable();
            $table->string('libelle_ar')->nullable();
            $table->integer('parent')->default(0);
            $table->string('ordre')->default('1');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('ref_commune_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_structures');
    }
};
