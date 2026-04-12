<?php

namespace Tests\Services\Customer;

use Eat518\Client;
use Eat518\Core\Util;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class ChannelsTest extends TestCase
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
    public function testAuthenticate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->customer->channels->authenticate(
            channelName: 'channel_name',
            socketID: 'socket_id'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsInt($result);
    }

    #[Test]
    public function testAuthenticateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->customer->channels->authenticate(
            channelName: 'channel_name',
            socketID: 'socket_id'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsInt($result);
    }
}
