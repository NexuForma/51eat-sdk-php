<?php

declare(strict_types=1);

namespace Eat518\ServiceContracts\Customer\Events;

use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Events\TicketHolds\TicketHoldCreateParams\Ticket;
use Eat518\Customer\Events\TicketHolds\TicketHoldNewResponse;
use Eat518\RequestOptions;

/**
 * @phpstan-import-type TicketShape from \Eat518\Customer\Events\TicketHolds\TicketHoldCreateParams\Ticket
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
interface TicketHoldsContract
{
    /**
     * @api
     *
     * @param list<Ticket|TicketShape> $tickets
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $eventID,
        array $tickets,
        RequestOptions|array|null $requestOptions = null,
    ): TicketHoldNewResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function release(
        string $sessionID,
        string $eventID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;
}
