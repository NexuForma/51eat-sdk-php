<?php

namespace Tests\Services\Customer\Messaging\Conversations;

use Eat518\Client;
use Eat518\Core\Util;
use Eat518\Customer\Messaging\Conversations\Messages\MessageListResponse;
use Eat518\Customer\Messaging\Conversations\Messages\MessageSendResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class MessagesTest extends TestCase
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
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->customer->messaging->conversations->messages->list(
            '550e8400-e29b-41d4-a716-446655440000'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageListResponse::class, $result);
    }

    #[Test]
    public function testGetUnreadCount(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->customer
            ->messaging
            ->conversations
            ->messages
            ->getUnreadCount('550e8400-e29b-41d4-a716-446655440000')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsInt($result);
    }

    #[Test]
    public function testMarkRead(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->customer
            ->messaging
            ->conversations
            ->messages
            ->markRead('550e8400-e29b-41d4-a716-446655440000')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsInt($result);
    }

    #[Test]
    public function testSend(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->customer->messaging->conversations->messages->send(
            '550e8400-e29b-41d4-a716-446655440000',
            content: 'Hello! I have a question about your menu.',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageSendResponse::class, $result);
    }

    #[Test]
    public function testSendWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->customer->messaging->conversations->messages->send(
            '550e8400-e29b-41d4-a716-446655440000',
            content: 'Hello! I have a question about your menu.',
            messageType: 'text',
            metadata: (object) [],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageSendResponse::class, $result);
    }
}
