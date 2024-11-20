<?php

declare(strict_types=1);

namespace Ilyes512\HttpLogger\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ilyes512\HttpLogger\Factories\HttpLoggerResponseFactory;

/**
 * @mixin Builder<static>
 */
class HttpLoggerResponse extends Model
{
    /**
     * @use HasFactory<HttpLoggerResponseFactory>
     */
    use HasFactory;
    use HasUlids;

    /**
     * @var class-string<HttpLoggerResponseFactory<static>>
     */
    private static string $factory = HttpLoggerResponseFactory::class;
}
