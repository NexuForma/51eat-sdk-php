<?php

declare(strict_types=1);

namespace Eat518\Services\Customer\Businesses;

use Eat518\Client;
use Eat518\Core\Exceptions\APIException;
use Eat518\Core\Util;
use Eat518\Customer\Businesses\Rsvp\RsvpCancelResponse;
use Eat518\Customer\Businesses\Rsvp\RsvpNewResponse;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\Businesses\RsvpContract;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class RsvpService implements RsvpContract
{
    /**
     * @api
     */
    public RsvpRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new RsvpRawService($client);
    }

    /**
     * @api
     *
     * Create or update the authenticated user's RSVP for a business event.
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
    ): RsvpNewResponse {
        $params = Util::removeNulls(
            ['handle' => $handle, 'status' => $status, 'notes' => $notes]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($event, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Cancel the authenticated user's RSVP for a business event.
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
    ): int {
        $params = Util::removeNulls(['handle' => $handle]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->cancel($event, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
