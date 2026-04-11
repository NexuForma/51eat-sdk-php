<?php

declare(strict_types=1);

namespace Eat518\Services\Customer;

use Eat518\Client;
use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
use Eat518\Core\Util;
use Eat518\Customer\Businesses\BusinessGetBulletinsParams;
use Eat518\Customer\Businesses\BusinessGetBulletinsResponse;
use Eat518\Customer\Businesses\BusinessGetEventsParams;
use Eat518\Customer\Businesses\BusinessGetEventsResponse;
use Eat518\Customer\Businesses\BusinessGetMenusParams;
use Eat518\Customer\Businesses\BusinessGetMenusResponse;
use Eat518\Customer\Businesses\BusinessGetPhotosParams;
use Eat518\Customer\Businesses\BusinessGetPhotosResponse;
use Eat518\Customer\Businesses\BusinessGetProfileResponse;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\BusinessesRawContract;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class BusinessesRawService implements BusinessesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve business announcements and updates with pagination.
     *
     * @param string $handle The business handle
     * @param array{page?: int, perPage?: int}|BusinessGetBulletinsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BusinessGetBulletinsResponse>
     *
     * @throws APIException
     */
    public function getBulletins(
        string $handle,
        array|BusinessGetBulletinsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BusinessGetBulletinsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['customer/businesses/%1$s/bulletins', $handle],
            query: Util::array_transform_keys($parsed, ['perPage' => 'per_page']),
            options: $options,
            convert: BusinessGetBulletinsResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve upcoming events for the business with pagination.
     *
     * @param string $handle The business handle
     * @param array{page?: int, perPage?: int}|BusinessGetEventsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BusinessGetEventsResponse>
     *
     * @throws APIException
     */
    public function getEvents(
        string $handle,
        array|BusinessGetEventsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BusinessGetEventsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['customer/businesses/%1$s/events', $handle],
            query: Util::array_transform_keys($parsed, ['perPage' => 'per_page']),
            options: $options,
            convert: BusinessGetEventsResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve all menus organized by groups for the business.
     *
     * @param string $handle The business handle
     * @param array{page?: int, perPage?: int}|BusinessGetMenusParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BusinessGetMenusResponse>
     *
     * @throws APIException
     */
    public function getMenus(
        string $handle,
        array|BusinessGetMenusParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BusinessGetMenusParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['customer/businesses/%1$s/menus', $handle],
            query: Util::array_transform_keys($parsed, ['perPage' => 'per_page']),
            options: $options,
            convert: BusinessGetMenusResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve photo gallery for the business with pagination.
     *
     * @param string $handle The business handle
     * @param array{page?: int, perPage?: int}|BusinessGetPhotosParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BusinessGetPhotosResponse>
     *
     * @throws APIException
     */
    public function getPhotos(
        string $handle,
        array|BusinessGetPhotosParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BusinessGetPhotosParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['customer/businesses/%1$s/photos', $handle],
            query: Util::array_transform_keys($parsed, ['perPage' => 'per_page']),
            options: $options,
            convert: BusinessGetPhotosResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve core business information for the profile page.
     *
     * @param string $handle The business handle
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BusinessGetProfileResponse>
     *
     * @throws APIException
     */
    public function retrieveProfile(
        string $handle,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['customer/businesses/%1$s', $handle],
            options: $requestOptions,
            convert: BusinessGetProfileResponse::class,
        );
    }
}
