<?php

declare(strict_types=1);

namespace Eat518\ServiceContracts\Customer;

use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
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

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
interface BusinessesRawContract
{
    /**
     * @api
     *
     * @param string $handle The business handle
     * @param array<string,mixed>|BusinessGetBulletinsParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $handle The business handle
     * @param array<string,mixed>|BusinessGetEventsParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $handle The business handle
     * @param array<string,mixed>|BusinessGetMenusParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $handle The business handle
     * @param array<string,mixed>|BusinessGetPhotosParams $params
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
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;
}
