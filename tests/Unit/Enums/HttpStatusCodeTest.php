<?php

declare(strict_types=1);

namespace Ilyes512\HttpLogger\Tests\Unit\Enums;

use Ilyes512\HttpLogger\Enums\HttpStatusCode;
use Ilyes512\HttpLogger\Tests\Unit\UnitTestCase;

final class HttpStatusCodeTest extends UnitTestCase
{
    public function testAllCases(): void
    {
        $this->assertMatchesObjectSnapshot(HttpStatusCode::cases());
    }

    public function testFetchingAllGroups(): void
    {
        $allInformational = HttpStatusCode::allInformational();
        $allSuccessful = HttpStatusCode::allSuccessful();
        $allRedirection = HttpStatusCode::allRedirection();
        $allClientError = HttpStatusCode::allClientError();
        $allServerError = HttpStatusCode::allServerError();

        $groupsTotal = count($allInformational)
            + count($allSuccessful)
            + count($allRedirection)
            + count($allClientError)
            + count($allServerError);

        self::assertCount($groupsTotal, HttpStatusCode::cases(), 'The total number of cases within the groups should be equal to all cases.');
        self::assertMatchesObjectSnapshot([
            'allInformational' => $allInformational,
            'allSuccessful' => $allSuccessful,
            'allRedirection' => $allRedirection,
            'allClientError' => $allClientError,
            'allServerError' => $allServerError,
        ]);
    }
}
