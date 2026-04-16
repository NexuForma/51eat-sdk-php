<?php

declare(strict_types=1);

namespace Eat518\ServiceContracts\Customer\Discovery;

use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Discovery\Categories\CategoryListResponse;
use Eat518\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
interface CategoriesContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): CategoryListResponse;
}
