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
        Schema::create('ref_moughataas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('libelle_fr', 120)->nullable();
            $table->string('libelle_ar', 120)->nullable();
            $table->string('code');
            $table->unsignedBigInteger('ref_wilaya_id');
            $table->integer('nbr_habitants')->default(0);
            $table->string('path_carte')->nullable();
            $table->integer('ordre')->default(1);
            $table->boolean('is_display')->default(true);
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
        Schema::dropIfExists('ref_moughataas');
    }
};
