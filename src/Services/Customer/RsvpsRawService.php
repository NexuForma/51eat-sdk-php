<?php

declare(strict_types=1);

namespace Eat518\Services\Customer;

use Eat518\Client;
use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
use Eat518\Core\Util;
use Eat518\Customer\Rsvps\RsvpListParams;
use Eat518\Customer\Rsvps\RsvpListResponse;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\RsvpsRawContract;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class RsvpsRawService implements RsvpsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve the authenticated user's event RSVPs with pagination.
     *
     * @param array{page?: int, perPage?: int, status?: string}|RsvpListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RsvpListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|RsvpListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RsvpListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'customer/rsvps',
            query: Util::array_transform_keys($parsed, ['perPage' => 'per_page']),
            options: $options,
            convert: RsvpListResponse::class,
        );
    }
}
