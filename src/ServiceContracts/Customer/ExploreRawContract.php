<?php

declare(strict_types=1);

namespace Eat518\ServiceContracts\Customer;

use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Explore\ExploreListBusinessesParams;
use Eat518\Customer\Explore\ExploreListBusinessesResponse;
use Eat518\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
interface ExploreRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ExploreListBusinessesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExploreListBusinessesResponse>
     *
     * @throws APIException
     */
    public function listBusinesses(
        array|ExploreListBusinessesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
