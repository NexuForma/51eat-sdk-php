<?php

declare(strict_types=1);

namespace Eat518\Services\Customer;

use Eat518\Client;
use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Businesses\BusinessGetResponse;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\BusinessesRawContract;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class BusinessesRawService implements BusinessesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve core business information for the profile page.
     *
     * @param string $handle The business handle
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BusinessGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $handle,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['customer/businesses/%1$s', $handle],
            options: $requestOptions,
            convert: BusinessGetResponse::class,
        );
    }
}
