<?php

declare(strict_types=1);

namespace Eat518\Services\Customer\Events;

use Eat518\Client;
use Eat518\Core\Exceptions\APIException;
use Eat518\Core\Util;
use Eat518\Customer\Events\TicketHolds\TicketHoldCreateParams\Ticket;
use Eat518\Customer\Events\TicketHolds\TicketHoldNewResponse;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\Events\TicketHoldsContract;

/**
 * @phpstan-import-type TicketShape from \Eat518\Customer\Events\TicketHolds\TicketHoldCreateParams\Ticket
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class TicketHoldsService implements TicketHoldsContract
{
    /**
     * @api
     */
    public TicketHoldsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TicketHoldsRawService($client);
    }

    /**
     * @api
     *
     * Place a temporary hold on tickets for the specified event. Holds expire after 10 minutes.
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
    ): TicketHoldNewResponse {
        $params = Util::removeNulls(['tickets' => $tickets]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($eventID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Release all active holds for the given session, freeing the tickets for others.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function release(
        string $sessionID,
        string $eventID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['eventID' => $eventID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->release($sessionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
