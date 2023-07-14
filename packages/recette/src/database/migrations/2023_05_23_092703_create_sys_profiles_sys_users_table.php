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
        Schema::create('sys_profiles_sys_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sys_profile_id')->index('sys_profiles_id');
            $table->integer('sys_user_id')->nullable()->index('users_id');
            $table->integer('object_id')->nullable()->index('b_strictures_id');
            $table->integer('id_objet')->nullable()->comment('id du niveau exp id commune si le niveau est commune');
            $table->integer('niveau_objet')->nullable()->comment('Niveau géo');
            $table->integer('ordre')->default(1);
            $table->unsignedInteger('admin_id')->index('admin_id');
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
        Schema::dropIfExists('sys_profiles_sys_users');
    }
};
