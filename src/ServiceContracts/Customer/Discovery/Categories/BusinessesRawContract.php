<?php

declare(strict_types=1);

namespace Eat518\ServiceContracts\Customer\Discovery\Categories;

use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Discovery\Categories\Businesses\BusinessListParams;
use Eat518\Customer\Discovery\Categories\Businesses\BusinessListResponse;
use Eat518\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
interface BusinessesRawContract
{
    /**
     * @api
     *
     * @param string $category The business category to filter by
     * @param array<string,mixed>|BusinessListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BusinessListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $category,
        array|BusinessListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
