<?php

declare(strict_types=1);

namespace Ilyes512\HttpLogger\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Ilyes512\HttpLogger\Models\HttpLoggerRequest;

/**
 * @template TModel of HttpLoggerRequest
 *
 * @extends Factory<TModel>
 */
class HttpLoggerRequestFactory extends Factory
{
    /**
     * @var class-string<TModel>
     */
    protected $model = HttpLoggerRequest::class;

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
