<?php

namespace Tests\Services\Customer;

use Eat518\Client;
use Eat518\Core\Util;
use Eat518\Customer\Businesses\BusinessGetEventsResponse;
use Eat518\Customer\Businesses\BusinessGetMenusResponse;
use Eat518\Customer\Businesses\BusinessGetPhotosResponse;
use Eat518\Customer\Businesses\BusinessGetResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class BusinessesTest extends TestCase
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
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->customer->businesses->retrieve('katzs-deli');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BusinessGetResponse::class, $result);
    }

    #[Test]
    public function testGetEvents(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->customer->businesses->getEvents('katzs-deli');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BusinessGetEventsResponse::class, $result);
    }

    #[Test]
    public function testGetMenus(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->customer->businesses->getMenus('katzs-deli');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BusinessGetMenusResponse::class, $result);
    }

    #[Test]
    public function testGetPhotos(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->customer->businesses->getPhotos('katzs-deli');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BusinessGetPhotosResponse::class, $result);
    }
}
