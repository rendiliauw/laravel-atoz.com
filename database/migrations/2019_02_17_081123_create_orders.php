<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('prepaid_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->string('invoice_number');
            $table->string('mobile_number',20)->nullable();
            $table->text('shipping_address')->nullable();
            $table->text('shipping_code')->nullable();
            $table->float('total_price')->unsigned()->default(0);
            $table->enum('status',['SUCCESS','FAILED','CANCELED','UNPAID'])->default('UNPAID');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('prepaid_id')->references('id')->on('prepaids');
            $table->foreign('product_id')->references('id')->on('products');
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

