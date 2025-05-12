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
        Schema::create('urls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_episode')->constrained('episodes')->onDelete('cascade');
            $table->text('url');
            $table->string('server_name',50);
            $table->enum('resolution', ['360p', '480p', '720p', '1080p', '4K'])->default('720p');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('urls');
    }
};
