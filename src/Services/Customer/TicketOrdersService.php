<?php

declare(strict_types=1);

namespace Eat518\Services\Customer;

use Eat518\Client;
use Eat518\Core\Exceptions\APIException;
use Eat518\Core\Util;
use Eat518\Customer\TicketOrders\TicketOrderGetResponse;
use Eat518\Customer\TicketOrders\TicketOrderListResponse;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\TicketOrdersContract;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class TicketOrdersService implements TicketOrdersContract
{
    /**
     * @api
     */
    public TicketOrdersRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TicketOrdersRawService($client);
    }

    /**
     * @api
     *
     * Retrieve a single ticket order belonging to the authenticated user.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $orderID,
        RequestOptions|array|null $requestOptions = null
    ): TicketOrderGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($orderID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the authenticated user's ticket orders with pagination.
     *
     * @param int $page Page number for pagination
     * @param int $perPage Number of orders per page
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        ?int $page = null,
        ?int $perPage = null,
        RequestOptions|array|null $requestOptions = null,
    ): TicketOrderListResponse {
        $params = Util::removeNulls(['page' => $page, 'perPage' => $perPage]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
