<?php

declare(strict_types=1);

namespace Eat518\Services\Customer;

use Eat518\Client;
use Eat518\Core\Exceptions\APIException;
use Eat518\Core\Util;
use Eat518\Customer\Events\EventCalculatePriceParams\Ticket;
use Eat518\Customer\Events\EventCalculatePriceResponse;
use Eat518\Customer\Events\EventConfirmTicketOrderResponse\Data;
use Eat518\Customer\Events\EventNewPaymentIntentResponse;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\EventsContract;
use Eat518\Services\Customer\Events\TicketHoldsService;

/**
 * @phpstan-import-type TicketShape from \Eat518\Customer\Events\EventCalculatePriceParams\Ticket
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class EventsService implements EventsContract
{
    /**
     * @api
     */
    public EventsRawService $raw;

    /**
     * @api
     */
    public TicketHoldsService $ticketHolds;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new EventsRawService($client);
        $this->ticketHolds = new TicketHoldsService($client);
    }

    /**
     * @api
     *
     * Preview the subtotal, platform fee, and total for a given ticket selection.
     *
     * @param list<Ticket|TicketShape> $tickets
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function calculatePrice(
        string $eventID,
        array $tickets,
        RequestOptions|array|null $requestOptions = null,
    ): EventCalculatePriceResponse {
        $params = Util::removeNulls(['tickets' => $tickets]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->calculatePrice($eventID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Confirm a completed Stripe payment and create the ticket order.
     * The payment must have succeeded before calling this endpoint.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return mixed|Data
     *
     * @throws APIException
     */
    public function confirmTicketOrder(
        string $eventID,
        string $paymentIntentID,
        string $sessionID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            ['paymentIntentID' => $paymentIntentID, 'sessionID' => $sessionID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->confirmTicketOrder($eventID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create a Stripe payment intent for the tickets held in the given session.
     * Returns a client_secret for the mobile app to confirm payment with Stripe.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createPaymentIntent(
        string $eventID,
        string $sessionID,
        RequestOptions|array|null $requestOptions = null,
    ): EventNewPaymentIntentResponse {
        $params = Util::removeNulls(['sessionID' => $sessionID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createPaymentIntent($eventID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
