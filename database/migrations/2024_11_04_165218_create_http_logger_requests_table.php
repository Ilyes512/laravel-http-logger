<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ilyes512\HttpLogger\Models\HttpLoggerEvent;

return new class extends Migration
{
    public function up(): void
    {
        $connection = config('http_logger.database');

        if (Schema::connection($connection)->hasTable('http_logger_requests')) {
            return;
        }

        Schema::connection($connection)
            ->create('http_logger_requests', static function (Blueprint $table) {
                $table->ulid('id')->primary();
                $table->foreignIdFor(HttpLoggerEvent::class)->constrained();
                $table->timestamps();
            });
    }

    public function down(): void
    {
        $connection = config('http_logger.database');

        if (Schema::connection($connection)->hasTable('http_logger_requests')) {
            Schema::connection($connection)->drop('http_logger_requests');
        }
    }
};
