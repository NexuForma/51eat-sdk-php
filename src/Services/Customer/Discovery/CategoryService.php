<?php

declare(strict_types=1);

namespace Eat518\Services\Customer\Discovery;

use Eat518\Client;
use Eat518\Core\Exceptions\APIException;
use Eat518\Core\Util;
use Eat518\Customer\Discovery\Category\CategoryGetBusinessesResponse;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\Discovery\CategoryContract;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class CategoryService implements CategoryContract
{
    /**
     * @api
     */
    public CategoryRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CategoryRawService($client);
    }

    /**
     * @api
     *
     * Retrieve businesses for a specific category with pagination support.
     * Results are optimized for list display.
     *
     * @param string $category The business category to filter by
     * @param int $page Page number for pagination
     * @param int $perPage Number of businesses per page
     * @param string $search Search term for business name or description
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getBusinesses(
        string $category,
        ?int $page = null,
        ?int $perPage = null,
        ?string $search = null,
        RequestOptions|array|null $requestOptions = null,
    ): CategoryGetBusinessesResponse {
        $params = Util::removeNulls(
            ['page' => $page, 'perPage' => $perPage, 'search' => $search]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getBusinesses($category, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
