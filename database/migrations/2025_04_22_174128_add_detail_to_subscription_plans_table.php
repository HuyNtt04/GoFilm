<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('subscriptions_plans', function (Blueprint $table) {
            $table->text('detail')->nullable()->after('price');
        });
    }

    public function down(): void {
        Schema::table('subscription_plans', function (Blueprint $table) {
            $table->dropColumn('detail');
        });
    }
};