<?php

declare(strict_types=1);

namespace Ilyes512\HttpLogger\Tests\Unit\Enums;

use Ilyes512\HttpLogger\Enums\HttpCode;
use Ilyes512\HttpLogger\Tests\Unit\UnitTestCase;

final class HttpCodeTest extends UnitTestCase
{
    public function testAllCases(): void
    {
        $this->assertMatchesObjectSnapshot(HttpCode::cases());
    }

    public function testFetchingAllGroups(): void
    {
        $allInformational = HttpCode::allInformational();
        $allSuccessful = HttpCode::allSuccessful();
        $allRedirection = HttpCode::allRedirection();
        $allClientError = HttpCode::allClientError();
        $allServerError = HttpCode::allServerError();

        $groupsTotal = count($allInformational)
            + count($allSuccessful)
            + count($allRedirection)
            + count($allClientError)
            + count($allServerError);

        self::assertCount($groupsTotal, HttpCode::cases(), 'The total number of cases within the groups should be equal to all cases.');
        self::assertMatchesObjectSnapshot([
            'allInformational' => $allInformational,
            'allSuccessful' => $allSuccessful,
            'allRedirection' => $allRedirection,
            'allClientError' => $allClientError,
            'allServerError' => $allServerError,
        ]);
    }
}
