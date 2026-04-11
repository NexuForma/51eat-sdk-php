<?php

namespace Tests;

use Eat518\Core\Util;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Mock\Client;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
class ClientTest extends TestCase
{
    public function testDefaultHeaders(): void
    {
        $transporter = new Client;
        $mockRsp = Psr17FactoryDiscovery::findResponseFactory()
            ->createResponse()
            ->withStatus(200)
            ->withHeader('Content-Type', 'application/json')
            ->withBody(Psr17FactoryDiscovery::findStreamFactory()->createStream(json_encode([], flags: Util::JSON_ENCODE_FLAGS) ?: ''))
        ;

        $transporter->setDefaultResponse($mockRsp);

        $client = new \Eat518\Client(
            baseUrl: 'http://localhost',
            httpSecurity: 'My HTTP Security',
            requestOptions: ['transporter' => $transporter],
        );

        $client->customer->register(
            deviceName: 'iPhone 15',
            email: 'john@example.com',
            name: 'John Doe',
            password: 'password123',
            passwordConfirmation: 'password123',
        );

        $this->assertNotFalse($requested = $transporter->getRequests()[0] ?? false);

        foreach (['accept', 'content-type'] as $header) {
            $sent = $requested->getHeaderLine($header);
            $this->assertNotEmpty($sent);
        }
    }
}
