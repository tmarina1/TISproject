<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->string('image');
            $table->string('brand');
            $table->integer('price');
            $table->integer('stock');
            $table->string('description');
            $table->float('weight');
            $table->unsignedBigInteger('itemID');
            $table->foreign('itemID')->references('id')->on('items')->onDelete('cascade');
            $table->unsignedBigInteger('reviewId');
            $table->foreign('reviewId')->references('id')->on('reviews')->onDelete('cascade');
            $table->unsignedBigInteger('userInWish');
            $table->foreign('userInWish')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
