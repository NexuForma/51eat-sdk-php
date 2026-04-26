<?php

declare(strict_types=1);

namespace Eat518\Services\Customer\Explore;

use Eat518\Client;
use Eat518\Core\Exceptions\APIException;
use Eat518\Core\Util;
use Eat518\Customer\Explore\Businesses\BusinessListResponse;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\Explore\BusinessesContract;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class BusinessesService implements BusinessesContract
{
    /**
     * @api
     */
    public BusinessesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BusinessesRawService($client);
    }

    /**
     * @api
     *
     * Retrieve businesses within the specified map bounds for map view.
     * Results are optimized for map display with essential business information.
     *
     * @param string $bounds Map bounds in format "north,south,east,west"
     * @param int $zoomLevel Map zoom level for optimization
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $bounds,
        ?int $zoomLevel = null,
        RequestOptions|array|null $requestOptions = null,
    ): BusinessListResponse {
        $params = Util::removeNulls(
            ['bounds' => $bounds, 'zoomLevel' => $zoomLevel]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
