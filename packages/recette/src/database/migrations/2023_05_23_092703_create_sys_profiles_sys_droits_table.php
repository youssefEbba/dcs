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
        Schema::create('sys_profiles_sys_droits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ordre')->default(1);
            $table->unsignedBigInteger('sys_droit_id');
            $table->unsignedBigInteger('sys_profile_id');
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
        Schema::dropIfExists('sys_profiles_sys_droits');
    }
};
