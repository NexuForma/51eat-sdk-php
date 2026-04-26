<?php

declare(strict_types=1);

namespace Eat518\Services\Customer\Businesses;

use Eat518\Client;
use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
use Eat518\Core\Util;
use Eat518\Customer\Businesses\Events\EventGetResponse;
use Eat518\Customer\Businesses\Events\EventListParams;
use Eat518\Customer\Businesses\Events\EventListResponse;
use Eat518\Customer\Businesses\Events\EventRetrieveParams;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\Businesses\EventsRawContract;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class EventsRawService implements EventsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve full details for a single upcoming event belonging to the business.
     *
     * @param array{handle: string}|EventRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EventGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $eventID,
        array|EventRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EventRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $handle = $parsed['handle'];
        unset($parsed['handle']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['customer/businesses/%1$s/events/%2$s', $handle, $eventID],
            options: $options,
            convert: EventGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve upcoming events for the business with pagination.
     *
     * @param string $handle The business handle
     * @param array{page?: int, perPage?: int}|EventListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EventListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $handle,
        array|EventListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EventListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['customer/businesses/%1$s/events', $handle],
            query: Util::array_transform_keys($parsed, ['perPage' => 'per_page']),
            options: $options,
            convert: EventListResponse::class,
        );
    }
}
