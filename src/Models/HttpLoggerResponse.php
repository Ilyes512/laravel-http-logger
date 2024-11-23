<?php

declare(strict_types=1);

namespace Ilyes512\HttpLogger\Models;

use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ilyes512\HttpLogger\Enums\HttpProtocolVersion;
use Ilyes512\HttpLogger\Enums\HttpStatusCode;
use Ilyes512\HttpLogger\Factories\HttpLoggerResponseFactory;
use Symfony\Component\Uid\Ulid;

/**
 * @property Ulid $id
 * @property HttpStatusCode $status_code
 * @property HttpProtocolVersion $protocol_version
 * @property ?string $charset
 * @property ?string $content_type
 * @property ?int $content_length
 * @property ?string $conent_transfer_encoding
 * @property CarbonInterface $updated_at
 * @property CarbonInterface $created_at
 *
 * @mixin Builder<static>
 */
class HttpLoggerResponse extends Model
{
    /**
     * @use HasFactory<HttpLoggerResponseFactory>
     */
    use HasFactory;
    use HasUlids;

    protected $casts = [
        'status_code' => HttpStatusCode::class,
        'protocol_version' => HttpProtocolVersion::class,
    ];

    /**
     * @var class-string<HttpLoggerResponseFactory>
     */
    private static string $factory = HttpLoggerResponseFactory::class;
}
