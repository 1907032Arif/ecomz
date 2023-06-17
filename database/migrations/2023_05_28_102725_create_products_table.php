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
            $table->string('name');
            $table->longText('description')->nullable();
            $table->string('image');
            $table->unsignedBigInteger('cat_id');
            $table->boolean('status')->default(1);
            $table->boolean('is_featured')->default(0);
            $table->integer('rating')->nullable();
            $table->integer('regular_price');
            $table->integer('offer_price')->nullable();
            $table->string('size')->default('M');
            $table->foreign('cat_id')->references('id')->on('catagories')->onDelete('cascade');
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
