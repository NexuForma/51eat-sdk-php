<?php

declare(strict_types=1);

namespace Eat518\Services\Customer;

use Eat518\Client;
use Eat518\Core\Exceptions\APIException;
use Eat518\Core\Util;
use Eat518\Customer\Rsvps\RsvpListResponse;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\RsvpsContract;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class RsvpsService implements RsvpsContract
{
    /**
     * @api
     */
    public RsvpsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new RsvpsRawService($client);
    }

    /**
     * @api
     *
     * Retrieve the authenticated user's event RSVPs with pagination.
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
    ): RsvpListResponse {
        $params = Util::removeNulls(
            ['page' => $page, 'perPage' => $perPage, 'status' => $status]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
