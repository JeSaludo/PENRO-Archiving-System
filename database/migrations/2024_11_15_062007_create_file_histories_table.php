<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('file_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('file_id')->constrained('files')->onDelete('cascade');
            $table->string('action'); // e.g., 'created', 'updated', 'archived'
            $table->text('changes')->nullable(); // JSON or text describing the changes
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade'); // The user who made the change
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_histories');
    }
};
