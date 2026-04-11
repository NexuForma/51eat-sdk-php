<?php

declare(strict_types=1);

namespace Eat518\Services\Customer;

use Eat518\Client;
use Eat518\Core\Exceptions\APIException;
use Eat518\Core\Util;
use Eat518\Customer\Businesses\BusinessGetBulletinsResponse;
use Eat518\Customer\Businesses\BusinessGetEventsResponse;
use Eat518\Customer\Businesses\BusinessGetMenusResponse;
use Eat518\Customer\Businesses\BusinessGetPhotosResponse;
use Eat518\Customer\Businesses\BusinessGetProfileResponse;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\BusinessesContract;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class BusinessesService implements BusinessesContract
{
    /**
     * @api
     */
    public BusinessesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BusinessesRawService($client);
    }

    /**
     * @api
     *
     * Retrieve business announcements and updates with pagination.
     *
     * @param string $handle The business handle
     * @param int $page Page number for pagination
     * @param int $perPage Number of bulletins per page
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getBulletins(
        string $handle,
        ?int $page = null,
        ?int $perPage = null,
        RequestOptions|array|null $requestOptions = null,
    ): BusinessGetBulletinsResponse {
        $params = Util::removeNulls(['page' => $page, 'perPage' => $perPage]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getBulletins($handle, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve upcoming events for the business with pagination.
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
    ): BusinessGetEventsResponse {
        $params = Util::removeNulls(['page' => $page, 'perPage' => $perPage]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getEvents($handle, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve all menus organized by groups for the business.
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
    ): BusinessGetMenusResponse {
        $params = Util::removeNulls(['page' => $page, 'perPage' => $perPage]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getMenus($handle, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve photo gallery for the business with pagination.
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
    ): BusinessGetPhotosResponse {
        $params = Util::removeNulls(['page' => $page, 'perPage' => $perPage]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getPhotos($handle, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve core business information for the profile page.
     *
     * @param string $handle The business handle
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveProfile(
        string $handle,
        RequestOptions|array|null $requestOptions = null
    ): BusinessGetProfileResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveProfile($handle, requestOptions: $requestOptions);

        return $response->parse();
    }
}
