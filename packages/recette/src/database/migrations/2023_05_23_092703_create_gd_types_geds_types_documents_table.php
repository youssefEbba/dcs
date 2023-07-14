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
        Schema::create('gd_types_geds_types_documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('gd_type_document_id');
            $table->unsignedBigInteger('gd_type_ged_id');
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
        Schema::dropIfExists('gd_types_geds_types_documents');
    }
};
