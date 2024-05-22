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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_category_id');
            $table->foreign('product_category_id')->references('id')->on('product_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->String('product_name',100)->unique();
            $table->Text('description');
            $table->Integer('price');
            $table->Integer('stok_quantity');
            $table->String('image1_url');
            $table->String('image2_url')->nullable();
            $table->String('image3_url')->nullable();
            $table->String('image4_url')->nullable();
            $table->String('image5_url')->nullable();
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
};
