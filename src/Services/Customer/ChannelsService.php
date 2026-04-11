<?php

declare(strict_types=1);

namespace Eat518\Services\Customer;

use Eat518\Client;
use Eat518\Core\Exceptions\APIException;
use Eat518\Core\Util;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\ChannelsContract;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class ChannelsService implements ChannelsContract
{
    /**
     * @api
     */
    public ChannelsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ChannelsRawService($client);
    }

    /**
     * @api
     *
     * This endpoint is used by the mobile app to authenticate with Pusher channels.
     * It validates that the user has permission to access the requested channel.
     *
     * @param string $channelName string
     * @param string $socketID string
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function authenticate(
        string $channelName,
        string $socketID,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(
            ['channelName' => $channelName, 'socketID' => $socketID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->authenticate(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
