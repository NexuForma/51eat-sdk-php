<?php

declare(strict_types=1);

namespace Eat518\ServiceContracts\Customer;

use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\TicketOrders\TicketOrderGetResponse;
use Eat518\Customer\TicketOrders\TicketOrderListParams;
use Eat518\Customer\TicketOrders\TicketOrderListResponse;
use Eat518\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
interface TicketOrdersRawContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TicketOrderGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $orderID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TicketOrderListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TicketOrderListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|TicketOrderListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
