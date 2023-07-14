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
        Schema::create('gd_types_documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('libelle_fr')->nullable();
            $table->string('libelle_ar')->nullable();
            $table->integer('ordre')->default(1);
            $table->unsignedBigInteger('gd_type_fichier_id');
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
        Schema::dropIfExists('gd_types_documents');
    }
};
