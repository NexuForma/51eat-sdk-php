<?php

declare(strict_types=1);

namespace Eat518\ServiceContracts\Customer;

use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Channels\ChannelAuthenticateParams;
use Eat518\Customer\Channels\ChannelAuthenticateResponse;
use Eat518\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
interface ChannelsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ChannelAuthenticateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<value-of<ChannelAuthenticateResponse>>
     *
     * @throws APIException
     */
    public function authenticate(
        array|ChannelAuthenticateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
