<?php

declare(strict_types=1);

namespace Eat518\Services\Customer;

use Eat518\Client;
use Eat518\Core\Exceptions\APIException;
use Eat518\Core\Util;
use Eat518\Customer\Tickets\TicketGetResponse;
use Eat518\Customer\Tickets\TicketListResponse;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\TicketsContract;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class TicketsService implements TicketsContract
{
    /**
     * @api
     */
    public TicketsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TicketsRawService($client);
    }

    /**
     * @api
     *
     * Retrieve a single ticket belonging to the authenticated user.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $ticketID,
        RequestOptions|array|null $requestOptions = null
    ): TicketGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($ticketID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the authenticated user's tickets with pagination.
     *
     * @param int $page Page number for pagination
     * @param int $perPage Number of tickets per page
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        ?int $page = null,
        ?int $perPage = null,
        RequestOptions|array|null $requestOptions = null,
    ): TicketListResponse {
        $params = Util::removeNulls(['page' => $page, 'perPage' => $perPage]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
