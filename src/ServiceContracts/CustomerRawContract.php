<?php

declare(strict_types=1);

namespace Eat518\ServiceContracts;

use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\CustomerGetUserResponse;
use Eat518\Customer\CustomerLoginParams;
use Eat518\Customer\CustomerLoginResponse;
use Eat518\Customer\CustomerLogoutAllResponse;
use Eat518\Customer\CustomerLogoutResponse;
use Eat518\Customer\CustomerRegisterParams;
use Eat518\Customer\CustomerRegisterResponse;
use Eat518\Customer\CustomerSearchParams;
use Eat518\Customer\CustomerSearchResponse;
use Eat518\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
interface CustomerRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|CustomerLoginParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CustomerLoginResponse>
     *
     * @throws APIException
     */
    public function login(
        array|CustomerLoginParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CustomerLogoutResponse>
     *
     * @throws APIException
     */
    public function logout(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CustomerLogoutAllResponse>
     *
     * @throws APIException
     */
    public function logoutAll(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CustomerRegisterParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CustomerRegisterResponse>
     *
     * @throws APIException
     */
    public function register(
        array|CustomerRegisterParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CustomerGetUserResponse>
     *
     * @throws APIException
     */
    public function retrieveUser(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CustomerSearchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CustomerSearchResponse>
     *
     * @throws APIException
     */
    public function search(
        array|CustomerSearchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
