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
        Schema::create('rct_mois_services', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('mois_id');
            $table->string('annee', 4);
            $table->integer('contribuable_id')->index('contribuable_id');
            $table->timestamps();
            $table->softDeletes();

            $table->index(['mois_id', 'contribuable_id'], 'mois_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rct_mois_services');
    }
};
