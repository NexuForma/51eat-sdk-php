<?php

declare(strict_types=1);

namespace Eat518\ServiceContracts\Customer\Discovery\Categories;

use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Discovery\Categories\Businesses\BusinessListResponse;
use Eat518\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
interface BusinessesContract
{
    /**
     * @api
     *
     * @param string $category The business category to filter by
     * @param int $page Page number for pagination
     * @param int $perPage Number of businesses per page
     * @param string $search Search term for business name or description
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $category,
        ?int $page = null,
        ?int $perPage = null,
        ?string $search = null,
        RequestOptions|array|null $requestOptions = null,
    ): BusinessListResponse;
}
