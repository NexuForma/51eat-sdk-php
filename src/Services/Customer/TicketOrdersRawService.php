<?php

declare(strict_types=1);

namespace Eat518\Services\Customer;

use Eat518\Client;
use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
use Eat518\Core\Util;
use Eat518\Customer\TicketOrders\TicketOrderGetResponse;
use Eat518\Customer\TicketOrders\TicketOrderListParams;
use Eat518\Customer\TicketOrders\TicketOrderListResponse;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\TicketOrdersRawContract;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class TicketOrdersRawService implements TicketOrdersRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a single ticket order belonging to the authenticated user.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['customer/ticket-orders/%1$s', $orderID],
            options: $requestOptions,
            convert: TicketOrderGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the authenticated user's ticket orders with pagination.
     *
     * @param array{page?: int, perPage?: int}|TicketOrderListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TicketOrderListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|TicketOrderListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TicketOrderListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'customer/ticket-orders',
            query: Util::array_transform_keys($parsed, ['perPage' => 'per_page']),
            options: $options,
            convert: TicketOrderListResponse::class,
        );
    }
}
