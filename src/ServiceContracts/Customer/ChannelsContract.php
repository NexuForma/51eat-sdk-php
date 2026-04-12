<?php

declare(strict_types=1);

namespace Eat518\ServiceContracts\Customer;

use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Channels\ChannelAuthenticateResponse;
use Eat518\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
interface ChannelsContract
{
    /**
     * @api
     *
     * @param string $channelName string
     * @param string $socketID string
     * @param RequestOpts|null $requestOptions
     *
     * @return value-of<ChannelAuthenticateResponse>
     *
     * @throws APIException
     */
    public function authenticate(
        string $channelName,
        string $socketID,
        RequestOptions|array|null $requestOptions = null,
    ): int;
}
