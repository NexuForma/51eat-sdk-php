<?php

declare(strict_types=1);

namespace Eat518\Services\Customer;

use Eat518\Client;
use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Tokens\TokenListResponse;
use Eat518\Customer\Tokens\TokenRevokeResponse;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\TokensRawContract;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class TokensRawService implements TokensRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a list of all API tokens for the authenticated user.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TokenListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'customer/tokens',
            options: $requestOptions,
            convert: TokenListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a specific API token by its ID.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TokenRevokeResponse>
     *
     * @throws APIException
     */
    public function revoke(
        string $token,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['customer/tokens/%1$s', $token],
            options: $requestOptions,
            convert: TokenRevokeResponse::class,
        );
    }
}
