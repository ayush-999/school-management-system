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
            if (!Schema::hasColumn('users', 'mobile')) {
                $table->string('mobile', 255)
                    ->after('profile_photo_path')
                    ->nullable();
            }

            if (!Schema::hasColumn('users', 'address')) {
                $table->text('address')
                    ->after('mobile')
                    ->nullable();
            }

            if (!Schema::hasColumn('users', 'gender')) {
                $table->string('gender', 255)
                    ->after('address')
                    ->nullable();
            }

            if (!Schema::hasColumn('users', 'image')) {
                $table->string('image', 255)
                    ->after('gender')
                    ->nullable();
            }

            if (!Schema::hasColumn('users', 'cover_image')) {
                $table->string('cover_image', 255)
                    ->after('image')
                    ->nullable();
            }

            if (!Schema::hasColumn('users', 'status')) {
                $table->tinyInteger('status')
                    ->after('cover_image')
                    ->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'mobile',
                'address',
                'gender',
                'image',
                'cover_image',
                'status',
            ]);
        });
    }
};
