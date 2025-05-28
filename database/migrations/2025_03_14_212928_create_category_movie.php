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
        Schema::create('category_movie', function (Blueprint $table) {
            $table->foreignId('id_category')->constrained('categories')->onDelete('cascade');
            $table->foreignId('id_movie')->constrained('movies')->onDelete('cascade');
            $table->primary(['id_category', 'id_movie'], 'category_movie_id_category_id_movie_primary');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_movie');
    }
};
