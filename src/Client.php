<?php

declare(strict_types=1);

namespace Eat518;

use Eat518\Core\BaseClient;
use Eat518\Core\Util;
use Eat518\Services\CustomerService;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;

/**
 * @phpstan-import-type NormalizedRequest from \Eat518\Core\BaseClient
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
class Client extends BaseClient
{
    public string $httpSecurity;

    /**
     * @api
     */
    public CustomerService $customer;

    /**
     * @param RequestOpts|null $requestOptions
     */
    public function __construct(
        ?string $httpSecurity = null,
        ?string $baseUrl = null,
        RequestOptions|array|null $requestOptions = null,
    ) {
        $this->httpSecurity = (string) ($httpSecurity ?? Util::getenv(
            'EAT518_HTTP_SECURITY'
        ));

        $baseUrl ??= Util::getenv('EAT518_BASE_URL') ?: 'https://51eat.co/api/v1';

        $options = RequestOptions::parse(
            RequestOptions::with(
                uriFactory: Psr17FactoryDiscovery::findUriFactory(),
                streamFactory: Psr17FactoryDiscovery::findStreamFactory(),
                requestFactory: Psr17FactoryDiscovery::findRequestFactory(),
                transporter: Psr18ClientDiscovery::find(),
            ),
            $requestOptions,
        );

        parent::__construct(
            headers: [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'User-Agent' => sprintf('eat518/PHP %s', VERSION),
                'X-Stainless-Lang' => 'php',
                'X-Stainless-Package-Version' => '0.0.3',
                'X-Stainless-Arch' => Util::machtype(),
                'X-Stainless-OS' => Util::ostype(),
                'X-Stainless-Runtime' => php_sapi_name(),
                'X-Stainless-Runtime-Version' => phpversion(),
            ],
            baseUrl: $baseUrl,
            options: $options
        );

        $this->customer = new CustomerService($this);
    }

    /**
     * @param array{http?: bool} $security
     *
     * @return array<string,string>
     */
    protected function authHeaders(array $security): array
    {
        return [...($security['http'] ?? false) ? $this->http() : []];
    }

    /** @return array<string,string> */
    protected function http(): array
    {
        return $this->httpSecurity ? [
            'Authorization' => "Bearer {$this->httpSecurity}",
        ] : [];
    }

    /**
     * @internal
     *
     * @param string|list<string> $path
     * @param array<string,mixed> $query
     * @param array<string,string|int|list<string|int>|null> $headers
     * @param RequestOpts|null $opts
     * @param array{http?: bool}|null $security
     *
     * @return array{NormalizedRequest, RequestOptions}
     */
    protected function buildRequest(
        string $method,
        string|array $path,
        array $query,
        array $headers,
        mixed $body,
        RequestOptions|array|null $opts,
        ?array $security = null,
    ): array {
        return parent::buildRequest(
            method: $method,
            path: $path,
            query: $query,
            headers: [
                ...$this->authHeaders(security: ($security ?? ['http' => true])),
                ...$headers,
            ],
            body: $body,
            opts: $opts,
            security: $security,
        );
    }
}
