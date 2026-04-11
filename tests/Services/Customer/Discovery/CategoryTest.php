<?php

namespace Tests\Services\Customer\Discovery;

use Eat518\Client;
use Eat518\Core\Util;
use Eat518\Customer\Discovery\Category\CategoryGetBusinessesResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class CategoryTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(httpSecurity: 'My HTTP Security', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testGetBusinesses(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->customer->discovery->category->getBusinesses(
            'restaurant'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CategoryGetBusinessesResponse::class, $result);
    }
}
