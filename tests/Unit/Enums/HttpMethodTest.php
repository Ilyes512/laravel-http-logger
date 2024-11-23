<?php

declare(strict_types=1);

namespace Ilyes512\HttpLogger\Tests\Unit\Enums;

use Ilyes512\HttpLogger\Enums\HttpMethod;
use Ilyes512\HttpLogger\Tests\Unit\UnitTestCase;

final class HttpMethodTest extends UnitTestCase
{
    public function testAllCases(): void
    {
        self::assertMatchesObjectSnapshot(HttpMethod::cases());
    }
}
