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
        Schema::create('comments_replies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_movie')->constrained('movies')->onDelete('cascade');
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_comment')->constrained('comments')->onDelete('cascade');
            $table->foreignId('id_user_reply')->constrained('users')->onDelete('cascade');
            $table->text('content');
            $table->boolean('isDeleted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments_replies');
    }
};
