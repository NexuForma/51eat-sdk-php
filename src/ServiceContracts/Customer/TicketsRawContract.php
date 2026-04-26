<?php

declare(strict_types=1);

namespace Eat518\ServiceContracts\Customer;

use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Tickets\TicketGetResponse;
use Eat518\Customer\Tickets\TicketListParams;
use Eat518\Customer\Tickets\TicketListResponse;
use Eat518\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
interface TicketsRawContract
{
    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TicketListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TicketListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|TicketListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
