<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name',191)->nullable();
            $table->string('order_no',191)->nullable();
            $table->string('user_phone',191)->nullable();
            $table->string('product_code',191)->nullable();
            $table->string('product_name',191)->nullable();
            $table->string('product_price',191)->nullable();
            $table->string('purchase_quantity',191)->nullable();
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
        Schema::dropIfExists('products');
    }
}
