<?php

declare(strict_types=1);

namespace Eat518\ServiceContracts\Customer\Businesses;

use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Businesses\Photos\PhotoListParams;
use Eat518\Customer\Businesses\Photos\PhotoListResponse;
use Eat518\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
interface PhotosRawContract
{
    /**
     * @api
     *
     * @param string $handle The business handle
     * @param array<string,mixed>|PhotoListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PhotoListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $handle,
        array|PhotoListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
