<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->unsignedInteger('user_id');
            $table->double('price');
            $table->unsignedInteger('qty');
            $table->string('thumbnail');
            $table->boolean('discount')->default(0);
            $table->float('discount_price');
            $table->text('options')->nullable();
            $table->boolean('status')->default(0);
            $table->string('slug');
            $table->unsignedInteger('totalImageUploaded')->default(0);
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
        Schema::dropIfExists('products');
    }
}
