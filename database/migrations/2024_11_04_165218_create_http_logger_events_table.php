<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $connection = config('http_logger.database');

        if (Schema::connection($connection)->hasTable('http_logger_events')) {
            return;
        }

        Schema::connection($connection)
            ->create('http_logger_events', static function (Blueprint $table) {
                $table->ulid('id')->primary();
                $table->string('user_model')->nullable();
                $table->string('user_id')->nullable();
                $table->timestamps();
            });
    }

    public function down(): void
    {
        $connection = config('http_logger.database');

        if (Schema::connection($connection)->hasTable('http_logger_events')) {
            Schema::connection($connection)->drop('http_logger_events');
        }
    }
};
