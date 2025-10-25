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
    Schema::create('files', function (Blueprint $table) {
        $table->id(); // id
        $table->string('original_name'); // original file name
        $table->string('file_name'); // stored file name
        $table->string('file_title')->nullable(); // optional title
        $table->string('file_path'); // storage path
        $table->unsignedBigInteger('file_size')->nullable(); // file size in bytes
        $table->string('model_type')->nullable(); // related model type (e.g., App\Models\User)
        $table->unsignedBigInteger('model_id')->nullable(); // related model ID
        $table->timestamp('uploaded_at')->useCurrent(); // uploaded timestamp
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
