<?php

declare(strict_types=1);

namespace Ilyes512\HttpLogger\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Ilyes512\HttpLogger\Models\HttpLoggerResponse;

/**
 * @template TModel of HttpLoggerResponse
 *
 * @extends Factory<TModel>
 */
class HttpLoggerResponseFactory extends Factory
{
    /**
     * @var class-string<TModel>
     */
    protected $model = HttpLoggerResponse::class;

    /**
     * @return array<string,mixed>
     */
    public function definition(): array
    {
        return [
            'http_logger_event_id' => HttpLoggerEventFactory::new(),
        ];
    }
}
