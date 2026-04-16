<?php

declare(strict_types=1);

namespace Eat518\Services\Customer\Businesses;

use Eat518\Client;
use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
use Eat518\Core\Util;
use Eat518\Customer\Businesses\Menus\MenuGetResponse;
use Eat518\Customer\Businesses\Menus\MenuRetrieveParams;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\Businesses\MenusRawContract;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class MenusRawService implements MenusRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve all menus organized by groups for the business.
     *
     * @param string $handle The business handle
     * @param array{page?: int, perPage?: int}|MenuRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MenuGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $handle,
        array|MenuRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MenuRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['customer/businesses/%1$s/menus', $handle],
            query: Util::array_transform_keys($parsed, ['perPage' => 'per_page']),
            options: $options,
            convert: MenuGetResponse::class,
        );
    }
}
