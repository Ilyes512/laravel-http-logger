<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $connection = config('http_logger.database');

        if (Schema::connection($connection)->hasTable('http_logger_responses')) {
            return;
        }

        Schema::connection($connection)
            ->create('http_logger_responses', static function (Blueprint $table) {
                $table->ulid();
                $table->foreignId('http_logger_event_id')->constrained();
                $table->timestamps();
            });
    }

    public function down(): void
    {
        $connection = config('http_logger.database');

        if (Schema::connection($connection)->hasTable('http_logger_responses')) {
            Schema::connection($connection)->drop('http_logger_responses');
        }
    }
};
