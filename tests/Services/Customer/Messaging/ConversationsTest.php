<?php

namespace Tests\Services\Customer\Messaging;

use Eat518\Client;
use Eat518\Core\Util;
use Eat518\Customer\Messaging\Conversations\ConversationGetResponse;
use Eat518\Customer\Messaging\Conversations\ConversationListResponse;
use Eat518\Customer\Messaging\Conversations\ConversationStartResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class ConversationsTest extends TestCase
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

        $result = $this->client->customer->messaging->conversations->retrieve(
            '550e8400-e29b-41d4-a716-446655440000'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ConversationGetResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->customer->messaging->conversations->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ConversationListResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->customer->messaging->conversations->delete(
            '550e8400-e29b-41d4-a716-446655440000'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsInt($result);
    }

    #[Test]
    public function testStart(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->customer->messaging->conversations->start(
            'marios-pizza'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ConversationStartResponse::class, $result);
    }
}
