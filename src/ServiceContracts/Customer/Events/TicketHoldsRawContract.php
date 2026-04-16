<?php

declare(strict_types=1);

namespace Eat518\ServiceContracts\Customer\Events;

use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Events\TicketHolds\TicketHoldCreateParams;
use Eat518\Customer\Events\TicketHolds\TicketHoldNewResponse;
use Eat518\Customer\Events\TicketHolds\TicketHoldReleaseParams;
use Eat518\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
interface TicketHoldsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|TicketHoldCreateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TicketHoldReleaseParams $params
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
    ): BaseResponse;
}
