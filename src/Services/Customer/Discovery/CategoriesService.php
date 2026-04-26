<?php

declare(strict_types=1);

namespace Eat518\Services\Customer\Discovery;

use Eat518\Client;
use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Discovery\Categories\CategoryListResponse;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\Discovery\CategoriesContract;
use Eat518\Services\Customer\Discovery\Categories\BusinessesService;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class CategoriesService implements CategoriesContract
{
    /**
     * @api
     */
    public CategoriesRawService $raw;

    /**
     * @api
     */
    public BusinessesService $businesses;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CategoriesRawService($client);
        $this->businesses = new BusinessesService($client);
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
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): CategoryListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }
}
