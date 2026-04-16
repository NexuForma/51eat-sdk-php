<?php

declare(strict_types=1);

namespace Eat518\ServiceContracts\Customer;

use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Rsvps\RsvpListResponse;
use Eat518\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
interface RsvpsContract
{
    /**
     * @api
     *
     * @param int $page Page number for pagination
     * @param int $perPage Number of RSVPs per page
     * @param string $status Filter by RSVP status
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        ?int $page = null,
        ?int $perPage = null,
        ?string $status = null,
        RequestOptions|array|null $requestOptions = null,
    ): RsvpListResponse;
}
