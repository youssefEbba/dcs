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
        Schema::create('sys_types_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('libelle', 120)->nullable();
            $table->string('libelle_ar', 120)->nullable();
            $table->string('dashboard', 120)->nullable();
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
        Schema::dropIfExists('sys_types_users');
    }
};
