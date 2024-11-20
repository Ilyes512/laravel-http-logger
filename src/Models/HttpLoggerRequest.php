<?php

declare(strict_types=1);

namespace Ilyes512\HttpLogger\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ilyes512\HttpLogger\Factories\HttpLoggerRequestFactory;

/**
 * @mixin Builder<static>
 */
class HttpLoggerRequest extends Model
{
    /**
     * @use HasFactory<HttpLoggerRequestFactory>
     */
    use HasFactory;
    use HasUlids;

    /**
     * @var class-string<HttpLoggerRequestFactory<static>>
     */
    private static string $factory = HttpLoggerRequestFactory::class;
}
