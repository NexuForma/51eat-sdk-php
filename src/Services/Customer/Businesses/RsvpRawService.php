<?php

declare(strict_types=1);

namespace Eat518\Services\Customer\Businesses;

use Eat518\Client;
use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Businesses\Rsvp\RsvpCancelParams;
use Eat518\Customer\Businesses\Rsvp\RsvpCancelResponse;
use Eat518\Customer\Businesses\Rsvp\RsvpCreateParams;
use Eat518\Customer\Businesses\Rsvp\RsvpNewResponse;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\Businesses\RsvpRawContract;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class RsvpRawService implements RsvpRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create or update the authenticated user's RSVP for a business event.
     *
     * @param string $event Path param: The event ID
     * @param array{
     *   handle: string, status: string, notes?: string
     * }|RsvpCreateParams $params
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
    ): BaseResponse {
        [$parsed, $options] = RsvpCreateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $handle = $parsed['handle'];
        unset($parsed['handle']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['customer/businesses/%1$s/events/%2$s/rsvp', $handle, $event],
            body: (object) array_diff_key($parsed, array_flip(['handle'])),
            options: $options,
            convert: RsvpNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Cancel the authenticated user's RSVP for a business event.
     *
     * @param string $event The event ID
     * @param array{handle: string}|RsvpCancelParams $params
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
    ): BaseResponse {
        [$parsed, $options] = RsvpCancelParams::parseRequest(
            $params,
            $requestOptions,
        );
        $handle = $parsed['handle'];
        unset($parsed['handle']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['customer/businesses/%1$s/events/%2$s/rsvp', $handle, $event],
            options: $options,
            convert: RsvpCancelResponse::class,
        );
    }
}
