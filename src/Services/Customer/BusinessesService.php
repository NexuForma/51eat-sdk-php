<?php

declare(strict_types=1);

namespace Eat518\Services\Customer;

use Eat518\Client;
use Eat518\Core\Exceptions\APIException;
use Eat518\Core\Util;
use Eat518\Customer\Businesses\BusinessGetEventsResponse;
use Eat518\Customer\Businesses\BusinessGetMenusResponse;
use Eat518\Customer\Businesses\BusinessGetPhotosResponse;
use Eat518\Customer\Businesses\BusinessGetResponse;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\BusinessesContract;
use Eat518\Services\Customer\Businesses\BulletinsService;
use Eat518\Services\Customer\Businesses\RsvpService;

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
     * @api
     */
    public BulletinsService $bulletins;

    /**
     * @api
     */
    public RsvpService $rsvp;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BusinessesRawService($client);
        $this->bulletins = new BulletinsService($client);
        $this->rsvp = new RsvpService($client);
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
    public function retrieve(
        string $handle,
        RequestOptions|array|null $requestOptions = null
    ): BusinessGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($handle, requestOptions: $requestOptions);

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
}
