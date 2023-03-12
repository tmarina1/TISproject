<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->text('review');
            $table->unsignedInteger('rate');
            $table->unsignedBigInteger('userId');
            $table->foreign('userId')->references('id')->on('reviews')->onDelete('cascade');
            $table->unsignedBigInteger('productId');
            $table->foreign('productId')->references('id')->on('reviews')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
