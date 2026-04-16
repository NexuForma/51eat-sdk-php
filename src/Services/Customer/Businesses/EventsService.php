<?php

declare(strict_types=1);

namespace Eat518\Services\Customer\Businesses;

use Eat518\Client;
use Eat518\Core\Exceptions\APIException;
use Eat518\Core\Util;
use Eat518\Customer\Businesses\Events\EventGetResponse;
use Eat518\Customer\Businesses\Events\EventListResponse;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\Businesses\EventsContract;
use Eat518\Services\Customer\Businesses\Events\RsvpService;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class EventsService implements EventsContract
{
    /**
     * @api
     */
    public EventsRawService $raw;

    /**
     * @api
     */
    public RsvpService $rsvp;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new EventsRawService($client);
        $this->rsvp = new RsvpService($client);
    }

    /**
     * @api
     *
     * Retrieve full details for a single upcoming event belonging to the business.
     *
     * @param string $handle The business handle
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $eventID,
        string $handle,
        RequestOptions|array|null $requestOptions = null,
    ): EventGetResponse {
        $params = Util::removeNulls(['handle' => $handle]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($eventID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve upcoming events for the business with pagination.
     *
     * @param string $handle The business handle
     * @param int $page Page number for pagination
     * @param int $perPage Number of events per page
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $handle,
        ?int $page = null,
        ?int $perPage = null,
        RequestOptions|array|null $requestOptions = null,
    ): EventListResponse {
        $params = Util::removeNulls(['page' => $page, 'perPage' => $perPage]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($handle, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
