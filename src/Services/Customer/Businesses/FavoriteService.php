<?php

declare(strict_types=1);

namespace Eat518\Services\Customer\Businesses;

use Eat518\Client;
use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Businesses\Favorite\FavoriteAddResponse;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\Businesses\FavoriteContract;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class FavoriteService implements FavoriteContract
{
    /**
     * @api
     */
    public FavoriteRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new FavoriteRawService($client);
    }

    /**
     * @api
     *
     * Add a business to the authenticated user's favorites.
     *
     * @param string $handle The business handle
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function add(
        string $handle,
        RequestOptions|array|null $requestOptions = null
    ): FavoriteAddResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->add($handle, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Remove a business from the authenticated user's favorites.
     *
     * @param string $handle The business handle
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function remove(
        string $handle,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->remove($handle, requestOptions: $requestOptions);

        return $response->parse();
    }
}
