<?php

declare(strict_types=1);

namespace Eat518\ServiceContracts\Customer;

use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Tokens\TokenListResponse;
use Eat518\Customer\Tokens\TokenRevokeResponse;
use Eat518\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
interface TokensRawContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TokenListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TokenRevokeResponse>
     *
     * @throws APIException
     */
    public function revoke(
        string $token,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
