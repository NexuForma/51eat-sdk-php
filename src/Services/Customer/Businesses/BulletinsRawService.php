<?php

declare(strict_types=1);

namespace Eat518\Services\Customer\Businesses;

use Eat518\Client;
use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
use Eat518\Core\Util;
use Eat518\Customer\Businesses\Bulletins\BulletinListParams;
use Eat518\Customer\Businesses\Bulletins\BulletinListResponse;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\Businesses\BulletinsRawContract;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class BulletinsRawService implements BulletinsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve business announcements and updates with pagination.
     *
     * @param string $handle The business handle
     * @param array{page?: int, perPage?: int}|BulletinListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BulletinListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $handle,
        array|BulletinListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BulletinListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['customer/businesses/%1$s/bulletins', $handle],
            query: Util::array_transform_keys($parsed, ['perPage' => 'per_page']),
            options: $options,
            convert: BulletinListResponse::class,
        );
    }
}
