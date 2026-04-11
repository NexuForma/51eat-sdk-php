<?php

namespace Tests\Services;

use Eat518\Client;
use Eat518\Core\Util;
use Eat518\Customer\CustomerGetUserResponse;
use Eat518\Customer\CustomerLoginResponse;
use Eat518\Customer\CustomerLogoutAllResponse;
use Eat518\Customer\CustomerLogoutResponse;
use Eat518\Customer\CustomerRegisterResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class CustomerTest extends TestCase
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
    public function testLogin(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->customer->login(
            deviceName: 'iPhone 15',
            email: 'user@example.com',
            password: 'password123',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CustomerLoginResponse::class, $result);
    }

    #[Test]
    public function testLoginWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->customer->login(
            deviceName: 'iPhone 15',
            email: 'user@example.com',
            password: 'password123',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CustomerLoginResponse::class, $result);
    }

    #[Test]
    public function testLogout(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->customer->logout();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CustomerLogoutResponse::class, $result);
    }

    #[Test]
    public function testLogoutAll(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->customer->logoutAll();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CustomerLogoutAllResponse::class, $result);
    }

    #[Test]
    public function testRegister(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->customer->register(
            deviceName: 'iPhone 15',
            email: 'john@example.com',
            name: 'John Doe',
            password: 'password123',
            passwordConfirmation: 'password123',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CustomerRegisterResponse::class, $result);
    }

    #[Test]
    public function testRegisterWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->customer->register(
            deviceName: 'iPhone 15',
            email: 'john@example.com',
            name: 'John Doe',
            password: 'password123',
            passwordConfirmation: 'password123',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CustomerRegisterResponse::class, $result);
    }

    #[Test]
    public function testRetrieveUser(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->customer->retrieveUser();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CustomerGetUserResponse::class, $result);
    }
}
