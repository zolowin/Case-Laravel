<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tr_user_id')->default(0);
            $table->foreign('tr_user_id')
                ->references('id')
                ->on('users');
            $table->double('tr_total_price')->default(0);
            $table->string('tr_address');
            $table->string('tr_city');
            $table->string('tr_phone');
            $table->string('tr_note')->nullable();
            $table->tinyInteger('tr_status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
