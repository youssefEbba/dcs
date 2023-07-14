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
        Schema::create('sys_menu_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('parent_id')->default(0);
            $table->unsignedBigInteger('sys_menu_id');
            $table->string('libelle');
            $table->string('libelle_ar')->nullable();
            $table->string('link')->default('');
            $table->string('icon')->default('');
            $table->string('model')->nullable();
            $table->unsignedBigInteger('sys_types_acce_id')->nullable();
            $table->string('groupe_traitement');
            $table->boolean('is_external')->default(false);
            $table->boolean('is_dynamic')->default(false);
            $table->integer('order')->default(0);
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
        Schema::dropIfExists('sys_menu_items');
    }
};
