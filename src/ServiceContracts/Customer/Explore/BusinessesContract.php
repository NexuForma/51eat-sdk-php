<?php

declare(strict_types=1);

namespace Eat518\ServiceContracts\Customer\Explore;

use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Explore\Businesses\BusinessListResponse;
use Eat518\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
interface BusinessesContract
{
    /**
     * @api
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
    ): BusinessListResponse;
}
