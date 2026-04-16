<?php

declare(strict_types=1);

namespace Eat518\Services\Customer;

use Eat518\Client;
use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
use Eat518\Core\Util;
use Eat518\Customer\Favorites\FavoriteListParams;
use Eat518\Customer\Favorites\FavoriteListResponse;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\FavoritesRawContract;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class FavoritesRawService implements FavoritesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve the authenticated user's favorited businesses with pagination.
     *
     * @param array{page?: int, perPage?: int}|FavoriteListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FavoriteListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|FavoriteListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FavoriteListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'customer/favorites',
            query: Util::array_transform_keys($parsed, ['perPage' => 'per_page']),
            options: $options,
            convert: FavoriteListResponse::class,
        );
    }
}
