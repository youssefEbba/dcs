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
        Schema::create('sys_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sys_session_id')->index('FK_sys_transactions_1');
            $table->integer('sys_types_transaction_id')->index('FK_sys_transactions_2');
            $table->string('modelable_type')->nullable();
            $table->integer('modelable_id')->nullable();
            $table->dateTime('tampon')->nullable();
            $table->text('commentaire')->nullable();
            $table->text('requetes')->nullable()->comment('camps::old_value || champ2::value');
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
        Schema::dropIfExists('sys_transactions');
    }
};
