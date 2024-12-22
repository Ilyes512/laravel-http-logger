<?php

declare(strict_types=1);

namespace Ilyes512\HttpLogger\Enums;

use BackedEnum;
use Ilyes512\EnumUtils\HasBackedEnumUtils;

/**
 * @implements BackedEnum<string>
 */
enum HttpProtocolVersion: string
{
    /** @use HasBackedEnumUtils<string> */
    use HasBackedEnumUtils;

    case HTTP_0_9 = 'HTTP/0.9';
    case HTTP_1_0 = 'HTTP/1.0';
    case HTTP_1_1 = 'HTTP/1.1';
    case HTTP_2_0 = 'HTTP/2.0';
    case HTTP_3_0 = 'HTTP/3.0';
}
