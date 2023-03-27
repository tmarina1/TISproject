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
        Schema::table('film_develop_orders', function (Blueprint $table) {
            $table->integer('price')->default(20)->change();
            $table->boolean('filmOfTheMonth')->default('0');
            $table->boolean('usePermission')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
