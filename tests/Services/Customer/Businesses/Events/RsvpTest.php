<?php

namespace Tests\Services\Customer\Businesses\Events;

use Eat518\Client;
use Eat518\Core\Util;
use Eat518\Customer\Businesses\Events\Rsvp\RsvpNewResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class RsvpTest extends TestCase
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
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->customer->businesses->events->rsvp->create(
            '01950e7d-1234-7000-abcd-ef0123456789',
            handle: 'katzs-deli',
            status: 'attending',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(RsvpNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->customer->businesses->events->rsvp->create(
            '01950e7d-1234-7000-abcd-ef0123456789',
            handle: 'katzs-deli',
            status: 'attending',
            notes: 'Looking forward to it!',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(RsvpNewResponse::class, $result);
    }

    #[Test]
    public function testCancel(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->customer->businesses->events->rsvp->cancel(
            '01950e7d-1234-7000-abcd-ef0123456789',
            handle: 'katzs-deli'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsInt($result);
    }

    #[Test]
    public function testCancelWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->customer->businesses->events->rsvp->cancel(
            '01950e7d-1234-7000-abcd-ef0123456789',
            handle: 'katzs-deli'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsInt($result);
    }
}
