<?php

declare(strict_types=1);

namespace Eat518\ServiceContracts\Customer\Businesses;

use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Businesses\Favorite\FavoriteAddResponse;
use Eat518\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
interface FavoriteContract
{
    /**
     * @api
     *
     * @param string $handle The business handle
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function add(
        string $handle,
        RequestOptions|array|null $requestOptions = null
    ): FavoriteAddResponse;

    /**
     * @api
     *
     * @param string $handle The business handle
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function remove(
        string $handle,
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
