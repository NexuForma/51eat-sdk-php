<?php

namespace Tests\Services\Customer;

use Eat518\Client;
use Eat518\Core\Util;
use Eat518\Customer\Businesses\BusinessGetBulletinsResponse;
use Eat518\Customer\Businesses\BusinessGetEventsResponse;
use Eat518\Customer\Businesses\BusinessGetMenusResponse;
use Eat518\Customer\Businesses\BusinessGetPhotosResponse;
use Eat518\Customer\Businesses\BusinessGetProfileResponse;
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
    public function testGetBulletins(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->customer->businesses->getBulletins('katzs-deli');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BusinessGetBulletinsResponse::class, $result);
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

    #[Test]
    public function testRetrieveProfile(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->customer->businesses->retrieveProfile(
            'katzs-deli'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BusinessGetProfileResponse::class, $result);
    }
}
