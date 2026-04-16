<?php

declare(strict_types=1);

namespace Eat518\Services\Customer\Explore;

use Eat518\Client;
use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
use Eat518\Core\Util;
use Eat518\Customer\Explore\Businesses\BusinessListParams;
use Eat518\Customer\Explore\Businesses\BusinessListResponse;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\Explore\BusinessesRawContract;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class BusinessesRawService implements BusinessesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve businesses within the specified map bounds for map view.
     * Results are optimized for map display with essential business information.
     *
     * @param array{bounds: string, zoomLevel?: int}|BusinessListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BusinessListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|BusinessListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BusinessListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'customer/explore/businesses',
            query: Util::array_transform_keys($parsed, ['zoomLevel' => 'zoom_level']),
            options: $options,
            convert: BusinessListResponse::class,
        );
    }
}
