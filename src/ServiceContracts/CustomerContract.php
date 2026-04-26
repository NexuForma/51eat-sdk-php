<?php

declare(strict_types=1);

namespace Eat518\ServiceContracts;

use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\CustomerGetUserResponse;
use Eat518\Customer\CustomerLoginResponse;
use Eat518\Customer\CustomerLogoutAllResponse;
use Eat518\Customer\CustomerLogoutResponse;
use Eat518\Customer\CustomerRegisterResponse;
use Eat518\Customer\CustomerSearchResponse;
use Eat518\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
interface CustomerContract
{
    /**
     * @api
     *
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

    /**
     * @api
     *
     * @param string $q Search query
     * @param string $category Filter by business category
     * @param string $city Filter by city
     * @param mixed $lat Latitude for geo radius filter (requires lng and radius_km)
     * @param mixed $lng Longitude for geo radius filter (requires lat and radius_km)
     * @param int $perType Max results per type (default 5, max 20)
     * @param int $radiusKm Geo radius in kilometers (requires lat and lng)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function search(
        string $q,
        ?string $category = null,
        ?string $city = null,
        mixed $lat = null,
        mixed $lng = null,
        ?int $perType = null,
        ?int $radiusKm = null,
        RequestOptions|array|null $requestOptions = null,
    ): CustomerSearchResponse;
}
