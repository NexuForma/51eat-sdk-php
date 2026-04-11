<?php

declare(strict_types=1);

namespace Eat518\ServiceContracts;

use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\CustomerGetUserResponse;
use Eat518\Customer\CustomerLoginResponse;
use Eat518\Customer\CustomerLogoutAllResponse;
use Eat518\Customer\CustomerLogoutResponse;
use Eat518\Customer\CustomerRegisterResponse;
use Eat518\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
interface CustomerContract
{
    /**
     * @api
     *
     * @param string $deviceName A descriptive name for the device
     * @param string $email The user's email address
     * @param string $password The user's password
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function login(
        string $deviceName,
        string $email,
        string $password,
        RequestOptions|array|null $requestOptions = null,
    ): CustomerLoginResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function logout(
        RequestOptions|array|null $requestOptions = null
    ): CustomerLogoutResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function logoutAll(
        RequestOptions|array|null $requestOptions = null
    ): CustomerLogoutAllResponse;

    /**
     * @api
     *
     * @param string $deviceName A descriptive name for the device
     * @param string $email The customer's email address
     * @param string $name The customer's full name
     * @param string $password The customer's password
     * @param string $passwordConfirmation Password confirmation
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function register(
        string $deviceName,
        string $email,
        string $name,
        string $password,
        string $passwordConfirmation,
        RequestOptions|array|null $requestOptions = null,
    ): CustomerRegisterResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveUser(
        RequestOptions|array|null $requestOptions = null
    ): CustomerGetUserResponse;
}
