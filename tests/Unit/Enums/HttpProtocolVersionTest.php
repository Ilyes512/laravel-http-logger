<?php

declare(strict_types=1);

namespace Ilyes512\HttpLogger\Tests\Unit\Enums;

use Ilyes512\HttpLogger\Enums\HttpProtocolVersion;
use Ilyes512\HttpLogger\Tests\Unit\UnitTestCase;

final class HttpProtocolVersionTest extends UnitTestCase
{
    public function testAllCases(): void
    {
        self::assertMatchesObjectSnapshot(HttpProtocolVersion::cases());
    }
}
