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
            $table->enum('role', ['admin', 'staff', 'user'])->default('user')->after('email');
            $table->string('number')->nullable()->after('role');
            $table->string('password_reset_otp')->nullable()->after('remember_token');
            $table->timestamp('password_reset_expires_at')->nullable()->after('password_reset_otp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'number', 'password_reset_otp', 'password_reset_expires_at']);
        });
    }
};
