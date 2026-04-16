<?php

declare(strict_types=1);

namespace Eat518\Services\Customer\Businesses;

use Eat518\Client;
use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Businesses\Favorite\FavoriteAddResponse;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\Businesses\FavoriteRawContract;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class FavoriteRawService implements FavoriteRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Add a business to the authenticated user's favorites.
     *
     * @param string $handle The business handle
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FavoriteAddResponse>
     *
     * @throws APIException
     */
    public function add(
        string $handle,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['customer/businesses/%1$s/favorite', $handle],
            options: $requestOptions,
            convert: FavoriteAddResponse::class,
        );
    }

    /**
     * @api
     *
     * Remove a business from the authenticated user's favorites.
     *
     * @param string $handle The business handle
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function remove(
        string $handle,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['customer/businesses/%1$s/favorite', $handle],
            options: $requestOptions,
            convert: 'mixed',
        );
    }
}
