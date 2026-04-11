<?php

declare(strict_types=1);

namespace Eat518\Services\Customer;

use Eat518\Client;
use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Discovery\DiscoveryListCategoriesResponse;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\DiscoveryRawContract;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class DiscoveryRawService implements DiscoveryRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a list of all business categories that have businesses.
     * This endpoint is used to populate category filters and navigation.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DiscoveryListCategoriesResponse>
     *
     * @throws APIException
     */
    public function listCategories(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'customer/discovery/categories',
            options: $requestOptions,
            convert: DiscoveryListCategoriesResponse::class,
        );
    }
}
