<?php

declare(strict_types=1);

namespace Eat518\Services\Customer;

use Eat518\Client;
use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Channels\ChannelAuthenticateParams;
use Eat518\Customer\Channels\ChannelAuthenticateResponse;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\ChannelsRawContract;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class ChannelsRawService implements ChannelsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * This endpoint is used by the mobile app to authenticate with Pusher channels.
     * It validates that the user has permission to access the requested channel.
     *
     * @param array{
     *   channelName: string, socketID: string
     * }|ChannelAuthenticateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<value-of<ChannelAuthenticateResponse>>
     *
     * @throws APIException
     */
    public function authenticate(
        array|ChannelAuthenticateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ChannelAuthenticateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'customer/channels/auth',
            body: (object) $parsed,
            options: $options,
            convert: ChannelAuthenticateResponse::class,
        );
    }
}
