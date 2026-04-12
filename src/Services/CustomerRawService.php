<?php

declare(strict_types=1);

namespace Eat518\Services;

use Eat518\Client;
use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\CustomerGetUserResponse;
use Eat518\Customer\CustomerLoginParams;
use Eat518\Customer\CustomerLoginResponse;
use Eat518\Customer\CustomerLogoutAllResponse;
use Eat518\Customer\CustomerLogoutResponse;
use Eat518\Customer\CustomerRegisterParams;
use Eat518\Customer\CustomerRegisterResponse;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\CustomerRawContract;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class CustomerRawService implements CustomerRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Exchange user credentials for an API token that can be used for subsequent authenticated requests.
     *
     * @param array{
     *   deviceName: string, email: string, password: string
     * }|CustomerLoginParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CustomerLoginResponse>
     *
     * @throws APIException
     */
    public function login(
        array|CustomerLoginParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CustomerLoginParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'customer/login',
            body: (object) $parsed,
            options: $options,
            convert: CustomerLoginResponse::class,
            security: [],
        );
    }

    /**
     * @api
     *
     * Revoke the current API token and log out the user.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CustomerLogoutResponse>
     *
     * @throws APIException
     */
    public function logout(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'customer/logout',
            options: $requestOptions,
            convert: CustomerLogoutResponse::class,
        );
    }

    /**
     * @api
     *
     * Revoke all API tokens for the authenticated user.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CustomerLogoutAllResponse>
     *
     * @throws APIException
     */
    public function logoutAll(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'customer/logout-all',
            options: $requestOptions,
            convert: CustomerLogoutAllResponse::class,
        );
    }

    /**
     * @api
     *
     * Create a new customer account and return an API token for immediate authentication.
     *
     * @param array{
     *   deviceName: string,
     *   email: string,
     *   name: string,
     *   password: string,
     *   passwordConfirmation: string,
     * }|CustomerRegisterParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CustomerRegisterResponse>
     *
     * @throws APIException
     */
    public function register(
        array|CustomerRegisterParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CustomerRegisterParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'customer/register',
            body: (object) $parsed,
            options: $options,
            convert: CustomerRegisterResponse::class,
            security: [],
        );
    }

    /**
     * @api
     *
     * Retrieve the current authenticated user's profile information.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CustomerGetUserResponse>
     *
     * @throws APIException
     */
    public function retrieveUser(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'customer/user',
            options: $requestOptions,
            convert: CustomerGetUserResponse::class,
        );
    }
}
