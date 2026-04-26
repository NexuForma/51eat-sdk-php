<?php

namespace Tests\Services\Customer\Businesses\Bulletins;

use Eat518\Client;
use Eat518\Core\Util;
use Eat518\Customer\Businesses\Bulletins\Comments\CommentListResponse;
use Eat518\Customer\Businesses\Bulletins\Comments\CommentNewResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class CommentsTest extends TestCase
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

        $result = $this->client->customer->businesses->bulletins->comments->create(
            '01950e7d-1234-7000-abcd-ef0123456789',
            handle: 'katzs-deli',
            body: 'Looking forward to this!',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CommentNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->customer->businesses->bulletins->comments->create(
            '01950e7d-1234-7000-abcd-ef0123456789',
            handle: 'katzs-deli',
            body: 'Looking forward to this!',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CommentNewResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->customer->businesses->bulletins->comments->list(
            '01950e7d-1234-7000-abcd-ef0123456789',
            handle: 'katzs-deli'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CommentListResponse::class, $result);
    }

    #[Test]
    public function testListWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->customer->businesses->bulletins->comments->list(
            '01950e7d-1234-7000-abcd-ef0123456789',
            handle: 'katzs-deli',
            page: 0,
            perPage: 0,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CommentListResponse::class, $result);
    }
}
