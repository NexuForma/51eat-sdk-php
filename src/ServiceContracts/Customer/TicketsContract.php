<?php

declare(strict_types=1);

namespace Eat518\ServiceContracts\Customer;

use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Tickets\TicketGetResponse;
use Eat518\Customer\Tickets\TicketListResponse;
use Eat518\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
interface TicketsContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $ticketID,
        RequestOptions|array|null $requestOptions = null
    ): TicketGetResponse;

    /**
     * @api
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
    ): TicketListResponse;
}
