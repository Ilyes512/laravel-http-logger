<?php

declare(strict_types=1);

namespace Ilyes512\HttpLogger\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Ilyes512\HttpLogger\Models\HttpLoggerEvent;

/**
 * @template TModel of HttpLoggerEvent
 *
 * @extends Factory<TModel>
 */
class HttpLoggerEventFactory extends Factory
{
    /**
     * @var class-string<TModel>
     */
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
