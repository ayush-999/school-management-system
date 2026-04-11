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
        Schema::table('users', function (Blueprint $table) {
            $table->string('status', 255)->change()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Set any existing string values to 1 (active) before converting back to integer
            \DB::statement("UPDATE users SET status = IF(status = 'active', 1, 0) WHERE status IS NOT NULL");
            $table->tinyInteger('status')->change()->nullable();
        });
    }
};
