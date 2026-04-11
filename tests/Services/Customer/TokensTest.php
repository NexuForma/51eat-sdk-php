<?php

namespace Tests\Services\Customer;

use Eat518\Client;
use Eat518\Core\Util;
use Eat518\Customer\Tokens\TokenListResponse;
use Eat518\Customer\Tokens\TokenRevokeResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class TokensTest extends TestCase
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

        $result = $this->client->customer->tokens->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TokenListResponse::class, $result);
    }

    #[Test]
    public function testRevoke(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->customer->tokens->revoke('token');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TokenRevokeResponse::class, $result);
    }
}
