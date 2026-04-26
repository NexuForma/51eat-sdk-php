<?php

declare(strict_types=1);

namespace Eat518\ServiceContracts\Customer;

use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Events\EventCalculatePriceParams\Ticket;
use Eat518\Customer\Events\EventCalculatePriceResponse;
use Eat518\Customer\Events\EventConfirmTicketOrderResponse\Data;
use Eat518\Customer\Events\EventListResponse;
use Eat518\Customer\Events\EventNewPaymentIntentResponse;
use Eat518\RequestOptions;

/**
 * @phpstan-import-type TicketShape from \Eat518\Customer\Events\EventCalculatePriceParams\Ticket
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
interface EventsContract
{
    /**
     * @api
     *
     * @param string $dateFrom Lower bound for event start date (ISO 8601). Defaults to now.
     * @param string $dateTo upper bound for event start date (ISO 8601)
     * @param int $page Page number
     * @param int $perPage Number of events per page
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        ?string $dateFrom = null,
        ?string $dateTo = null,
        ?int $page = null,
        ?int $perPage = null,
        RequestOptions|array|null $requestOptions = null,
    ): EventListResponse;

    /**
     * @api
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
    ): EventCalculatePriceResponse;

    /**
     * @api
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
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createPaymentIntent(
        string $eventID,
        string $sessionID,
        RequestOptions|array|null $requestOptions = null,
    ): EventNewPaymentIntentResponse;
}
