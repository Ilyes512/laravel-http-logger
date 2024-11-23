<?php

declare(strict_types=1);

namespace Ilyes512\HttpLogger\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Ilyes512\HttpLogger\Enums\HttpProtocolVersion;
use Ilyes512\HttpLogger\Enums\HttpStatusCode;
use Ilyes512\HttpLogger\Models\HttpLoggerResponse;

/**
 * @extends Factory<HttpLoggerResponse>
 */
class HttpLoggerResponseFactory extends Factory
{
    protected $model = HttpLoggerResponse::class;

    /**
     * @return array<string,mixed>
     */
    public function definition(): array
    {
        return [
            'status_code' => $this->faker->randomElement(HttpStatusCode::allSuccessful()),
            'protocol_version' => $this->faker->randomElement(HttpProtocolVersion::cases()),
            'charset' => $this->faker->optional()->randomElement(['utf-8', 'UTF-16', 'iso-8859-1']),
            'content_type' => $this->faker->optional()->randomElement([
                'text/html',
                'application/json',
                'application/xml',
                'application/json',
            ]),
            'content_length' => $this->faker->optional()->numberBetween(1, 1000),
            'content_transfer_encoding' => $this->faker->optional()->randomElement(['chunked', 'compress', 'deflate', 'gzip']),
            'http_logger_event_id' => HttpLoggerEventFactory::new(),
        ];
    }
}
