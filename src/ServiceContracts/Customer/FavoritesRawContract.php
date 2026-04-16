<?php

declare(strict_types=1);

namespace Eat518\ServiceContracts\Customer;

use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Favorites\FavoriteListParams;
use Eat518\Customer\Favorites\FavoriteListResponse;
use Eat518\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
interface FavoritesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|FavoriteListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FavoriteListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|FavoriteListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
