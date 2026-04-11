<?php

declare(strict_types=1);

namespace Eat518\ServiceContracts\Customer;

use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Discovery\DiscoveryListCategoriesResponse;
use Eat518\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
interface DiscoveryContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listCategories(
        RequestOptions|array|null $requestOptions = null
    ): DiscoveryListCategoriesResponse;
}
