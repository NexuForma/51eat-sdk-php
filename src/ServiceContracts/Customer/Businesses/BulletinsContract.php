<?php

declare(strict_types=1);

namespace Eat518\ServiceContracts\Customer\Businesses;

use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Businesses\Bulletins\BulletinListResponse;
use Eat518\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
interface BulletinsContract
{
    /**
     * @api
     *
     * @param string $handle The business handle
     * @param int $page Page number for pagination
     * @param int $perPage Number of bulletins per page
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $handle,
        ?int $page = null,
        ?int $perPage = null,
        RequestOptions|array|null $requestOptions = null,
    ): BulletinListResponse;
}
