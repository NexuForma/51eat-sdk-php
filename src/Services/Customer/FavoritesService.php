<?php

declare(strict_types=1);

namespace Eat518\Services\Customer;

use Eat518\Client;
use Eat518\Core\Exceptions\APIException;
use Eat518\Core\Util;
use Eat518\Customer\Favorites\FavoriteListResponse;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\FavoritesContract;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class FavoritesService implements FavoritesContract
{
    /**
     * @api
     */
    public FavoritesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new FavoritesRawService($client);
    }

    /**
     * @api
     *
     * Retrieve the authenticated user's favorited businesses with pagination.
     *
     * @param int $page Page number for pagination
     * @param int $perPage Number of businesses per page
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        ?int $page = null,
        ?int $perPage = null,
        RequestOptions|array|null $requestOptions = null,
    ): FavoriteListResponse {
        $params = Util::removeNulls(['page' => $page, 'perPage' => $perPage]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
