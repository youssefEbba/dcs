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
        Schema::create('sys_droits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('libelle', 120);
            $table->integer('type_acces')->comment('Tous =0, Consultation=1,Enregestrement=2,Validation=3,Edition=4,Suppression=5	');
            $table->integer('sys_groupes_traitement_id')->index('sys_groupes_traitements_id');
            $table->integer('sys_types_acce_id')->nullable()->index('sys_types_acce_id');
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
        Schema::dropIfExists('sys_droits');
    }
};
