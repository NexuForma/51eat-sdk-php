<?php

declare(strict_types=1);

namespace Eat518\Services\Customer\Discovery;

use Eat518\Client;
use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
use Eat518\Core\Util;
use Eat518\Customer\Discovery\Category\CategoryGetBusinessesParams;
use Eat518\Customer\Discovery\Category\CategoryGetBusinessesResponse;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\Discovery\CategoryRawContract;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class CategoryRawService implements CategoryRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve businesses for a specific category with pagination support.
     * Results are optimized for list display.
     *
     * @param string $category The business category to filter by
     * @param array{
     *   page?: int, perPage?: int, search?: string
     * }|CategoryGetBusinessesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CategoryGetBusinessesResponse>
     *
     * @throws APIException
     */
    public function getBusinesses(
        string $category,
        array|CategoryGetBusinessesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CategoryGetBusinessesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['customer/discovery/category/%1$s/businesses', $category],
            query: Util::array_transform_keys($parsed, ['perPage' => 'per_page']),
            options: $options,
            convert: CategoryGetBusinessesResponse::class,
        );
    }
}
