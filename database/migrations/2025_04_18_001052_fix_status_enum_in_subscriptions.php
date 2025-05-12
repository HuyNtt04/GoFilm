<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends \Illuminate\Database\Migrations\Migration {
    public function up(): void
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            // Đổi lại ENUM đúng giá trị
            $table->enum('Status', ['active', 'inactive', 'expired'])->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            // Nếu cần rollback lại lỗi ban đầu thì:
            $table->enum('Status', ['active,inactive,expired'])->nullable()->change();
        });
    }
};