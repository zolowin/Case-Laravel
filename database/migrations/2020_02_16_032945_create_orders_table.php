<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('or_transaction_id');
            $table->foreign('or_transaction_id')
                ->references('id')
                ->on('transactions');
            $table->unsignedBigInteger('or_product_id');
            $table->foreign('or_product_id')
                ->references('product_id')
                ->on('products');
            $table->tinyInteger('or_qty');
            $table->double('or_price');
            $table->tinyInteger('or_sale')->default(0);
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
        Schema::dropIfExists('orders');
    }
}
