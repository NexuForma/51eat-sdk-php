<?php

declare(strict_types=1);

namespace Eat518\Customer\Channels;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Concerns\SdkParams;
use Eat518\Core\Contracts\BaseModel;

/**
 * This endpoint is used by the mobile app to authenticate with Pusher channels.
 * It validates that the user has permission to access the requested channel.
 *
 * @see Eat518\Services\Customer\ChannelsService::authenticate()
 *
 * @phpstan-type ChannelAuthenticateParamsShape = array{
 *   channelName: string, socketID: string
 * }
 */
final class ChannelAuthenticateParams implements BaseModel
{
    /** @use SdkModel<ChannelAuthenticateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * string.
     */
    #[Required('channel_name')]
    public string $channelName;

    /**
     * string.
     */
    #[Required('socket_id')]
    public string $socketID;

    /**
     * `new ChannelAuthenticateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ChannelAuthenticateParams::with(channelName: ..., socketID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ChannelAuthenticateParams)->withChannelName(...)->withSocketID(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $channelName, string $socketID): self
    {
        $self = new self;

        $self['channelName'] = $channelName;
        $self['socketID'] = $socketID;

        return $self;
    }

    /**
     * string.
     */
    public function withChannelName(string $channelName): self
    {
        $self = clone $this;
        $self['channelName'] = $channelName;

        return $self;
    }

    /**
     * string.
     */
    public function withSocketID(string $socketID): self
    {
        $self = clone $this;
        $self['socketID'] = $socketID;

        return $self;
    }
}
