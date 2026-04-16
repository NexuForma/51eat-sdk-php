<?php

declare(strict_types=1);

namespace Eat518\Services\Customer\Businesses;

use Eat518\Client;
use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
use Eat518\Core\Util;
use Eat518\Customer\Businesses\Photos\PhotoListParams;
use Eat518\Customer\Businesses\Photos\PhotoListResponse;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\Businesses\PhotosRawContract;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class PhotosRawService implements PhotosRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve photo gallery for the business with pagination.
     *
     * @param string $handle The business handle
     * @param array{page?: int, perPage?: int}|PhotoListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PhotoListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $handle,
        array|PhotoListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PhotoListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['customer/businesses/%1$s/photos', $handle],
            query: Util::array_transform_keys($parsed, ['perPage' => 'per_page']),
            options: $options,
            convert: PhotoListResponse::class,
        );
    }
}
