<?php

declare(strict_types=1);

namespace Eat518\Services\Customer\Businesses;

use Eat518\Client;
use Eat518\Core\Exceptions\APIException;
use Eat518\Core\Util;
use Eat518\Customer\Businesses\Menus\MenuGetResponse;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\Businesses\MenusContract;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class MenusService implements MenusContract
{
    /**
     * @api
     */
    public MenusRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MenusRawService($client);
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
    public function retrieve(
        string $handle,
        ?int $page = null,
        ?int $perPage = null,
        RequestOptions|array|null $requestOptions = null,
    ): MenuGetResponse {
        $params = Util::removeNulls(['page' => $page, 'perPage' => $perPage]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($handle, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
