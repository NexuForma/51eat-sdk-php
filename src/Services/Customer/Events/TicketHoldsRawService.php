<?php

declare(strict_types=1);

namespace Eat518\Services\Customer\Events;

use Eat518\Client;
use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Events\TicketHolds\TicketHoldCreateParams;
use Eat518\Customer\Events\TicketHolds\TicketHoldCreateParams\Ticket;
use Eat518\Customer\Events\TicketHolds\TicketHoldNewResponse;
use Eat518\Customer\Events\TicketHolds\TicketHoldReleaseParams;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\Events\TicketHoldsRawContract;

/**
 * @phpstan-import-type TicketShape from \Eat518\Customer\Events\TicketHolds\TicketHoldCreateParams\Ticket
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class TicketHoldsRawService implements TicketHoldsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Place a temporary hold on tickets for the specified event. Holds expire after 10 minutes.
     *
     * @param array{tickets: list<Ticket|TicketShape>}|TicketHoldCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TicketHoldNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $eventID,
        array|TicketHoldCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TicketHoldCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['customer/events/%1$s/ticket-holds', $eventID],
            body: (object) $parsed,
            options: $options,
            convert: TicketHoldNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Release all active holds for the given session, freeing the tickets for others.
     *
     * @param array{eventID: string}|TicketHoldReleaseParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function release(
        string $sessionID,
        array|TicketHoldReleaseParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TicketHoldReleaseParams::parseRequest(
            $params,
            $requestOptions,
        );
        $eventID = $parsed['eventID'];
        unset($parsed['eventID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['customer/events/%1$s/ticket-holds/%2$s', $eventID, $sessionID],
            options: $options,
            convert: null,
        );
    }
}
