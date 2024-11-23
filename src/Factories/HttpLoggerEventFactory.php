<?php

declare(strict_types=1);

namespace Ilyes512\HttpLogger\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Ilyes512\HttpLogger\Models\HttpLoggerEvent;

/**
 * @extends Factory<HttpLoggerEvent>
 */
class HttpLoggerEventFactory extends Factory
{
    protected $model = HttpLoggerEvent::class;

    /**
     * @return array<string,mixed>
     */
    public function definition(): array
    {
        return [
            //
        ];
    }
}
