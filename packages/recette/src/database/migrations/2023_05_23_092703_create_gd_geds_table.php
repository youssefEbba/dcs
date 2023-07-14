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
        Schema::create('gd_geds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('libelle_fr')->nullable();
            $table->string('libelle_ar')->nullable();
            $table->string('emplacement');
            $table->integer('objet_id');
            $table->integer('type')->default(1);
            $table->unsignedBigInteger('gd_type_document_id');
            $table->unsignedBigInteger('gd_type_ged_id');
            $table->unsignedBigInteger('sys_user_id')->nullable();
            $table->unsignedBigInteger('sys_types_user_id')->nullable();
            $table->text('commentaire')->nullable();
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
        Schema::dropIfExists('gd_geds');
    }
};
