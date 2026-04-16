<?php

declare(strict_types=1);

namespace Eat518\Services\Customer;

use Eat518\Client;
use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
use Eat518\Core\Util;
use Eat518\Customer\Tickets\TicketGetResponse;
use Eat518\Customer\Tickets\TicketListParams;
use Eat518\Customer\Tickets\TicketListResponse;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\TicketsRawContract;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class TicketsRawService implements TicketsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a single ticket belonging to the authenticated user.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TicketGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $ticketID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['customer/tickets/%1$s', $ticketID],
            options: $requestOptions,
            convert: TicketGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the authenticated user's tickets with pagination.
     *
     * @param array{page?: int, perPage?: int}|TicketListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TicketListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|TicketListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TicketListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'customer/tickets',
            query: Util::array_transform_keys($parsed, ['perPage' => 'per_page']),
            options: $options,
            convert: TicketListResponse::class,
        );
    }
}
