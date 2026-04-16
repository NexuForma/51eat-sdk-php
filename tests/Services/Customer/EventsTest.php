<?php

namespace Tests\Services\Customer;

use Eat518\Client;
use Eat518\Core\Util;
use Eat518\Customer\Events\EventCalculatePriceResponse;
use Eat518\Customer\Events\EventNewPaymentIntentResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class EventsTest extends TestCase
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
    public function testCalculatePrice(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->customer->events->calculatePrice(
            'eventId',
            tickets: [['quantity' => 1, 'ticketTypeID' => 'ticket_type_id']],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EventCalculatePriceResponse::class, $result);
    }

    #[Test]
    public function testCalculatePriceWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->customer->events->calculatePrice(
            'eventId',
            tickets: [['quantity' => 1, 'ticketTypeID' => 'ticket_type_id']],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EventCalculatePriceResponse::class, $result);
    }

    #[Test]
    public function testConfirmTicketOrder(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->customer->events->confirmTicketOrder(
            'eventId',
            paymentIntentID: 'payment_intent_id',
            sessionID: 'session_id'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNotNull($result);
    }

    #[Test]
    public function testConfirmTicketOrderWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->customer->events->confirmTicketOrder(
            'eventId',
            paymentIntentID: 'payment_intent_id',
            sessionID: 'session_id'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNotNull($result);
    }

    #[Test]
    public function testCreatePaymentIntent(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->customer->events->createPaymentIntent(
            'eventId',
            sessionID: 'session_id'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EventNewPaymentIntentResponse::class, $result);
    }

    #[Test]
    public function testCreatePaymentIntentWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->customer->events->createPaymentIntent(
            'eventId',
            sessionID: 'session_id'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EventNewPaymentIntentResponse::class, $result);
    }
}
