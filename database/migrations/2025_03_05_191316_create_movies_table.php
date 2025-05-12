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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title',50);
            $table->text('description');
            $table->string('thumbnail',255);
            $table->text('cast');
            $table->string('director',20);
            $table->year('release_year');
            $table->string('country',100);
            $table->bigInteger('views');
            $table->integer('film_duration');
            $table->boolean('isDeleted')->default(false);
            $table->boolean('isPremium')->default(false);
          
            $table->json('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->dropForeign(['category_id']); // Xóa khóa ngoại
            $table->dropColumn('category_id');  // Xóa cột
        });
    
        Schema::dropIfExists('movies');
    }
};