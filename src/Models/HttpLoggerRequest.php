<?php

declare(strict_types=1);

namespace Ilyes512\HttpLogger\Models;

use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ilyes512\HttpLogger\Enums\HttpMethod;
use Ilyes512\HttpLogger\Factories\HttpLoggerRequestFactory;
use Symfony\Component\Uid\Ulid;

/**
 * @property Ulid $id
 * @property HttpMethod $method
 * @property string $uri
 * @property ?string $ip
 * @property ?string $route_fingerprint
 * @property bool $prefetch
 * @property CarbonInterface $updated_at
 * @property CarbonInterface $created_at
 *
 * @mixin Builder<static>
 */
class HttpLoggerRequest extends Model
{
    /**
     * @use HasFactory<HttpLoggerRequestFactory>
     */
    use HasFactory;
    use HasUlids;

    protected $casts = [
        'method' => HttpMethod::class,
    ];

    /**
     * @var class-string<HttpLoggerRequestFactory>
     */
    private static string $factory = HttpLoggerRequestFactory::class;
}
