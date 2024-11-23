<?php

declare(strict_types=1);

namespace Ilyes512\HttpLogger\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Ilyes512\HttpLogger\Enums\HttpMethod;
use Ilyes512\HttpLogger\Models\HttpLoggerRequest;

/**
 * @extends Factory<HttpLoggerRequest>
 *
 * @phpstan-type HttpLoggerRequestFactoryAttributes array{
 *      method: HttpMethod,
 *      uri: string,
 *      ip: ?string,
 *      prefetch: bool,
 *      http_logger_event_id: int|HttpLoggerEventFactory,
 *  }
 */
class HttpLoggerRequestFactory extends Factory
{
    private const NO_FINGERPRINT = 'my-route-fingerprint';

    protected $model = HttpLoggerRequest::class;

    /**
     * @return HttpLoggerRequestFactoryAttributes
     */
    public function definition(): array
    {
        /** @var HttpMethod $method */
        $method = $this->faker->randomElement(HttpMethod::cases());

        /** @var ?string $ip */
        $ip = $this->faker->optional(30)->ipv4(); // 70% chance of NULL

        return [
            'method' => $method,
            'uri' => $this->faker->url(),
            'ip' => $ip,
            'prefetch' => $this->faker->boolean(20), // 20% chance of getting TRUE
            'http_logger_event_id' => HttpLoggerEventFactory::new(),
        ];
    }

    public function withoutFingerprint(): static
    {
        return $this->state(fn (): array => ['route_fingerprint' => self::NO_FINGERPRINT]);
    }

    public function withFingerprint(): static
    {
        return $this->state(function (array $attributes): array {
            /** @var HttpLoggerRequestFactoryAttributes $attributes */

            return [
                'route_fingerprint' => $this->routeFingerprint($attributes['method'], $attributes['uri'], $attributes['ip']),
            ];
        });
    }

    public function configure(): static
    {
        return $this->afterMaking(function (HttpLoggerRequest $model): void {
            if ($model->route_fingerprint === self::NO_FINGERPRINT) {
                $model->route_fingerprint = null;

                return;
            }

            if ($model->route_fingerprint !== null) {
                return;
            }

            $model->route_fingerprint = $this->faker->boolean(80) // chance of 80% of getting TRUE
                ? $this->routeFingerprint($model->method, $model->uri, $model->ip)
                : null;
        });
    }

    private function routeFingerprint(HttpMethod $method, string $uri, ?string $ip): string
    {
        return sha1(implode('|', [$method->name, 'myapplication.local', $uri, $ip]));
    }
}
