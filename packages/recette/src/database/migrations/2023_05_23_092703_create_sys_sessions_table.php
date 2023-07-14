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
        Schema::create('sys_sessions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('sys_user_id')->default(0)->index('FK_sys_sessions_1');
            $table->string('ip_address')->nullable();
            $table->text('user_agent')->nullable();
            $table->dateTime('t_login')->nullable();
            $table->dateTime('t_logout')->nullable();
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
        Schema::dropIfExists('sys_sessions');
    }
};
