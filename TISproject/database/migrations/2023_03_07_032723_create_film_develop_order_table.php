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
        Schema::create('film_develop_order', function (Blueprint $table) {
            $table->id();
            $table->string('reference_film');
            $table->string('photo')->default('');
            $table->float('price');
            $table->boolean('state')->default('0');
            $table->string('observation')->default('');
            $table->int('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('film_develop_order');
    }
};
