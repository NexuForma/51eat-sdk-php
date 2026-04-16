<?php

declare(strict_types=1);

namespace Eat518\Services\Customer;

use Eat518\Client;
use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
use Eat518\Core\Util;
use Eat518\Customer\Events\EventCalculatePriceParams;
use Eat518\Customer\Events\EventCalculatePriceParams\Ticket;
use Eat518\Customer\Events\EventCalculatePriceResponse;
use Eat518\Customer\Events\EventConfirmTicketOrderParams;
use Eat518\Customer\Events\EventConfirmTicketOrderResponse;
use Eat518\Customer\Events\EventConfirmTicketOrderResponse\Data;
use Eat518\Customer\Events\EventCreatePaymentIntentParams;
use Eat518\Customer\Events\EventListParams;
use Eat518\Customer\Events\EventListResponse;
use Eat518\Customer\Events\EventNewPaymentIntentResponse;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\EventsRawContract;

/**
 * @phpstan-import-type TicketShape from \Eat518\Customer\Events\EventCalculatePriceParams\Ticket
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class EventsRawService implements EventsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a paginated feed of upcoming events across all businesses.
     * Defaults to all events starting from now, ordered by start date ascending.
     * Optionally filter by a date range using date_from and date_to.
     *
     * @param array{
     *   dateFrom?: string, dateTo?: string, page?: int, perPage?: int
     * }|EventListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EventListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|EventListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EventListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'customer/events',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'dateFrom' => 'date_from',
                    'dateTo' => 'date_to',
                    'perPage' => 'per_page',
                ],
            ),
            options: $options,
            convert: EventListResponse::class,
        );
    }

    /**
     * @api
     *
     * Preview the subtotal, platform fee, and total for a given ticket selection.
     *
     * @param array{
     *   tickets: list<Ticket|TicketShape>
     * }|EventCalculatePriceParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EventCalculatePriceResponse>
     *
     * @throws APIException
     */
    public function calculatePrice(
        string $eventID,
        array|EventCalculatePriceParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EventCalculatePriceParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['customer/events/%1$s/calculate-price', $eventID],
            body: (object) $parsed,
            options: $options,
            convert: EventCalculatePriceResponse::class,
        );
    }

    /**
     * @api
     *
     * Confirm a completed Stripe payment and create the ticket order.
     * The payment must have succeeded before calling this endpoint.
     *
     * @param array{
     *   paymentIntentID: string, sessionID: string
     * }|EventConfirmTicketOrderParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed|Data>
     *
     * @throws APIException
     */
    public function confirmTicketOrder(
        string $eventID,
        array|EventConfirmTicketOrderParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EventConfirmTicketOrderParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['customer/events/%1$s/ticket-orders', $eventID],
            body: (object) $parsed,
            options: $options,
            convert: EventConfirmTicketOrderResponse::class,
        );
    }

    /**
     * @api
     *
     * Create a Stripe payment intent for the tickets held in the given session.
     * Returns a client_secret for the mobile app to confirm payment with Stripe.
     *
     * @param array{sessionID: string}|EventCreatePaymentIntentParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EventNewPaymentIntentResponse>
     *
     * @throws APIException
     */
    public function createPaymentIntent(
        string $eventID,
        array|EventCreatePaymentIntentParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EventCreatePaymentIntentParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['customer/events/%1$s/payment-intent', $eventID],
            body: (object) $parsed,
            options: $options,
            convert: EventNewPaymentIntentResponse::class,
        );
    }
}
