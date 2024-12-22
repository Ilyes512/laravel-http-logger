<?php

declare(strict_types=1);

namespace Ilyes512\HttpLogger\Enums;

use Ilyes512\EnumUtils\HasEnumUtils;

enum HttpMethod
{
    use HasEnumUtils;

    case GET;
    case HEAD;
    case OPTIONS;
    case TRACE;
    case PUT;
    case DELETE;
    case POST;
    case PATCH;
    case CONNECT;

    public function isSafe(): bool
    {
        return match ($this) {
            self::GET, self::HEAD, self::OPTIONS, self::TRACE => true,
            self::PUT, self::DELETE, self::POST, self::PATCH, self::CONNECT => false,
        };
    }

    public function isIdempotent(): bool
    {
        return match ($this) {
            self::GET, self::HEAD, self::OPTIONS, self::TRACE, self::DELETE => true,
            self::PUT, self::POST, self::PATCH, self::CONNECT => false,
        };
    }
}
