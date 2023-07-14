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
        Schema::table('rct_contribuables_annees', function (Blueprint $table) {
            $table->foreign(['contribuable_id'], 'rct_contribuables_annees_ibfk_1')->references(['id'])->on('rct_contribuables')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rct_contribuables_annees', function (Blueprint $table) {
            $table->dropForeign('rct_contribuables_annees_ibfk_1');
        });
    }
};
