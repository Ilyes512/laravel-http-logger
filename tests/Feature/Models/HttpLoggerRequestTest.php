<?php

declare(strict_types=1);

namespace Ilyes512\HttpLogger\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Ilyes512\HttpLogger\Models\HttpLoggerRequest;
use Ilyes512\HttpLogger\Tests\Feature\FeatureTestCase;

final class HttpLoggerRequestTest extends FeatureTestCase
{
    use RefreshDatabase;

    public function testHttpLoggerRequestFactory(): void
    {
        $httpLoggerRequest = HttpLoggerRequest::factory()->create();

        $this->assertDatabaseHas(HttpLoggerRequest::class, ['id' => $httpLoggerRequest->id]);
    }
}
