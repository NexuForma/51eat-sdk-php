<?php

declare(strict_types=1);

namespace Eat518\ServiceContracts\Customer\Businesses;

use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Businesses\Bulletins\BulletinListParams;
use Eat518\Customer\Businesses\Bulletins\BulletinListResponse;
use Eat518\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
interface BulletinsRawContract
{
    /**
     * @api
     *
     * @param string $handle The business handle
     * @param array<string,mixed>|BulletinListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BulletinListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $handle,
        array|BulletinListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
