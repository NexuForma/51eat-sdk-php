<?php

declare(strict_types=1);

namespace Eat518\ServiceContracts\Customer\Businesses;

use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Businesses\Menus\MenuGetResponse;
use Eat518\Customer\Businesses\Menus\MenuRetrieveParams;
use Eat518\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
interface MenusRawContract
{
    /**
     * @api
     *
     * @param string $handle The business handle
     * @param array<string,mixed>|MenuRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MenuGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $handle,
        array|MenuRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
