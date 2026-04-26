<?php

declare(strict_types=1);

namespace Eat518\ServiceContracts\Customer;

use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Events\EventCalculatePriceParams;
use Eat518\Customer\Events\EventCalculatePriceResponse;
use Eat518\Customer\Events\EventConfirmTicketOrderParams;
use Eat518\Customer\Events\EventConfirmTicketOrderResponse\Data;
use Eat518\Customer\Events\EventCreatePaymentIntentParams;
use Eat518\Customer\Events\EventListParams;
use Eat518\Customer\Events\EventListResponse;
use Eat518\Customer\Events\EventNewPaymentIntentResponse;
use Eat518\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
interface EventsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|EventListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EventListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|EventListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|EventCalculatePriceParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|EventConfirmTicketOrderParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|EventCreatePaymentIntentParams $params
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
    ): BaseResponse;
}
