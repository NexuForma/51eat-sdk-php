<?php

declare(strict_types=1);

namespace Eat518\ServiceContracts\Customer\Businesses;

use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Businesses\Rsvp\RsvpCancelResponse;
use Eat518\Customer\Businesses\Rsvp\RsvpNewResponse;
use Eat518\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
interface RsvpContract
{
    /**
     * @api
     *
     * @param string $event Path param: The event ID
     * @param string $handle Path param: The business handle
     * @param string $status Body param: RSVP status
     * @param string $notes Body param: Optional notes
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $event,
        string $handle,
        string $status,
        ?string $notes = null,
        RequestOptions|array|null $requestOptions = null,
    ): RsvpNewResponse;

    /**
     * @api
     *
     * @param string $event The event ID
     * @param string $handle The business handle
     * @param RequestOpts|null $requestOptions
     *
     * @return value-of<RsvpCancelResponse>
     *
     * @throws APIException
     */
    public function cancel(
        string $event,
        string $handle,
        RequestOptions|array|null $requestOptions = null,
    ): int;
}
