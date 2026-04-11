<?php

declare(strict_types=1);

namespace Eat518\Services\Customer;

use Eat518\Client;
use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Tokens\TokenListResponse;
use Eat518\Customer\Tokens\TokenRevokeResponse;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\TokensContract;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class TokensService implements TokensContract
{
    /**
     * @api
     */
    public TokensRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TokensRawService($client);
    }

    /**
     * @api
     *
     * Retrieve a list of all API tokens for the authenticated user.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): TokenListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a specific API token by its ID.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function revoke(
        string $token,
        RequestOptions|array|null $requestOptions = null
    ): TokenRevokeResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->revoke($token, requestOptions: $requestOptions);

        return $response->parse();
    }
}
