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
        Schema::table('rct_details_payements', function (Blueprint $table) {
            $table->foreign(['payement_id'], 'rct_details_payements_ibfk_1')->references(['id'])->on('rct_payements')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rct_details_payements', function (Blueprint $table) {
            $table->dropForeign('rct_details_payements_ibfk_1');
        });
    }
};
