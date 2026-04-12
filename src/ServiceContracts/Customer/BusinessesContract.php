<?php

declare(strict_types=1);

namespace Eat518\ServiceContracts\Customer;

use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Businesses\BusinessGetEventsResponse;
use Eat518\Customer\Businesses\BusinessGetMenusResponse;
use Eat518\Customer\Businesses\BusinessGetPhotosResponse;
use Eat518\Customer\Businesses\BusinessGetResponse;
use Eat518\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
interface BusinessesContract
{
    /**
     * @api
     *
     * @param string $handle The business handle
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $handle,
        RequestOptions|array|null $requestOptions = null
    ): BusinessGetResponse;

    /**
     * @api
     *
     * @param string $handle The business handle
     * @param int $page Page number for pagination
     * @param int $perPage Number of events per page
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getEvents(
        string $handle,
        ?int $page = null,
        ?int $perPage = null,
        RequestOptions|array|null $requestOptions = null,
    ): BusinessGetEventsResponse;

    /**
     * @api
     *
     * @param string $handle The business handle
     * @param int $page Page number for pagination
     * @param int $perPage Number of items per page
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getMenus(
        string $handle,
        ?int $page = null,
        ?int $perPage = null,
        RequestOptions|array|null $requestOptions = null,
    ): BusinessGetMenusResponse;

    /**
     * @api
     *
     * @param string $handle The business handle
     * @param int $page Page number for pagination
     * @param int $perPage Number of photos per page
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getPhotos(
        string $handle,
        ?int $page = null,
        ?int $perPage = null,
        RequestOptions|array|null $requestOptions = null,
    ): BusinessGetPhotosResponse;
}
