<?php

declare(strict_types=1);

namespace Eat518\Services\Customer;

use Eat518\Client;
use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
use Eat518\Core\Util;
use Eat518\Customer\Explore\ExploreListBusinessesParams;
use Eat518\Customer\Explore\ExploreListBusinessesResponse;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\ExploreRawContract;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class ExploreRawService implements ExploreRawContract
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
     * @param array{
     *   bounds: string, zoomLevel?: int
     * }|ExploreListBusinessesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExploreListBusinessesResponse>
     *
     * @throws APIException
     */
    public function listBusinesses(
        array|ExploreListBusinessesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ExploreListBusinessesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'customer/explore/businesses',
            query: Util::array_transform_keys($parsed, ['zoomLevel' => 'zoom_level']),
            options: $options,
            convert: ExploreListBusinessesResponse::class,
        );
    }
}
