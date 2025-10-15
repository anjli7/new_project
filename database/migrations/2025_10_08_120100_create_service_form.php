<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_form', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('business');
            $table->string('service');
            $table->string('message');
            $table->timestamps();
        });
    }

  
    public function down(): void
    {
        Schema::dropIfExists('service_form');
    }
};
