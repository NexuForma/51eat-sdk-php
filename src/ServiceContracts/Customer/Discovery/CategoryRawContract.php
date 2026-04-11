<?php

declare(strict_types=1);

namespace Eat518\ServiceContracts\Customer\Discovery;

use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Discovery\Category\CategoryGetBusinessesParams;
use Eat518\Customer\Discovery\Category\CategoryGetBusinessesResponse;
use Eat518\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
interface CategoryRawContract
{
    /**
     * @api
     *
     * @param string $category The business category to filter by
     * @param array<string,mixed>|CategoryGetBusinessesParams $params
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
    ): BaseResponse;
}
