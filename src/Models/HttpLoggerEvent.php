<?php

declare(strict_types=1);

namespace Ilyes512\HttpLogger\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ilyes512\HttpLogger\Factories\HttpLoggerEventFactory;

/**
 * @mixin Builder<static>
 */
class HttpLoggerEvent extends Model
{
    /**
     * @use HasFactory<HttpLoggerEventFactory>
     */
    use HasFactory;
    use HasUlids;

    /**
     * @var class-string<HttpLoggerEventFactory>
     */
    private static string $factory = HttpLoggerEventFactory::class;
}
