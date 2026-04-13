<?php

declare(strict_types=1);

namespace Eat518\ServiceContracts\Customer\Businesses;

use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Businesses\Rsvp\RsvpCancelParams;
use Eat518\Customer\Businesses\Rsvp\RsvpCancelResponse;
use Eat518\Customer\Businesses\Rsvp\RsvpCreateParams;
use Eat518\Customer\Businesses\Rsvp\RsvpNewResponse;
use Eat518\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
interface RsvpRawContract
{
    /**
     * @api
     *
     * @param string $event Path param: The event ID
     * @param array<string,mixed>|RsvpCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RsvpNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $event,
        array|RsvpCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $event The event ID
     * @param array<string,mixed>|RsvpCancelParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<value-of<RsvpCancelResponse>>
     *
     * @throws APIException
     */
    public function cancel(
        string $event,
        array|RsvpCancelParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
