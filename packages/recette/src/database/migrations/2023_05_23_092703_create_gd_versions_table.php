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
        Schema::create('gd_versions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('extension', 50);
            $table->bigInteger('taille')->nullable();
            $table->date('date_version');
            $table->unsignedBigInteger('gd_ged_id');
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
        Schema::dropIfExists('gd_versions');
    }
};
