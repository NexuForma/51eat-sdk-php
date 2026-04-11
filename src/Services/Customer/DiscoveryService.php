<?php

declare(strict_types=1);

namespace Eat518\Services\Customer;

use Eat518\Client;
use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Discovery\DiscoveryListCategoriesResponse;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\DiscoveryContract;
use Eat518\Services\Customer\Discovery\CategoryService;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class DiscoveryService implements DiscoveryContract
{
    /**
     * @api
     */
    public DiscoveryRawService $raw;

    /**
     * @api
     */
    public CategoryService $category;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new DiscoveryRawService($client);
        $this->category = new CategoryService($client);
    }

    /**
     * @api
     *
     * Retrieve a list of all business categories that have businesses.
     * This endpoint is used to populate category filters and navigation.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listCategories(
        RequestOptions|array|null $requestOptions = null
    ): DiscoveryListCategoriesResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listCategories(requestOptions: $requestOptions);

        return $response->parse();
    }
}
