<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->date('order_date');
            $table->string('buyer_name');
            $table->unsignedInteger('billing_address_id')->default(1);
            $table->unsignedInteger('shipping_address_id')->default(1);
            $table->date('required_date')->nullable();
            $table->date('shipped_date')->nullable();
            $table->unsignedInteger('shipper_id')->nullable();
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
