<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('lastName');
            $table->string('telephone');
            $table->string('address');
            $table->string('userType')->default('client');
        });
    }

    public function down(): void
    {
        $table->dropColumn(['lastName']);
        $table->dropColumn(['telephone']);
        $table->dropColumn(['address']);
        $table->dropColumn(['userType']);
        $table->dropColumn(['reviewId']);
        $table->dropColumn(['productInWishId']);
    }
};
