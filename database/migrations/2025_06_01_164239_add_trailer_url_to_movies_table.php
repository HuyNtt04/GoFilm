<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('movies', function (Blueprint $table) {
        $table->string('trailer_url')->nullable()->after('thumbnail'); // hoặc bất kỳ vị trí nào bạn muốn
    });
}

public function down()
{
    Schema::table('movies', function (Blueprint $table) {
        $table->dropColumn('trailer_url');
    });
}

};