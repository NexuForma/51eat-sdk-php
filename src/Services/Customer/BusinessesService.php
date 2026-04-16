<?php

declare(strict_types=1);

namespace Eat518\Services\Customer;

use Eat518\Client;
use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Businesses\BusinessGetResponse;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\BusinessesContract;
use Eat518\Services\Customer\Businesses\BulletinsService;
use Eat518\Services\Customer\Businesses\EventsService;
use Eat518\Services\Customer\Businesses\FavoriteService;
use Eat518\Services\Customer\Businesses\MenusService;
use Eat518\Services\Customer\Businesses\PhotosService;

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
    public MenusService $menus;

    /**
     * @api
     */
    public PhotosService $photos;

    /**
     * @api
     */
    public FavoriteService $favorite;

    /**
     * @api
     */
    public EventsService $events;

    /**
     * @api
     */
    public BulletinsService $bulletins;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BusinessesRawService($client);
        $this->menus = new MenusService($client);
        $this->photos = new PhotosService($client);
        $this->favorite = new FavoriteService($client);
        $this->events = new EventsService($client);
        $this->bulletins = new BulletinsService($client);
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
}
