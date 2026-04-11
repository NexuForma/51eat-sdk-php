<?php

declare(strict_types=1);

namespace Eat518\Customer\Messaging\Conversations\Messages;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type MessageShape from \Eat518\Customer\Messaging\Conversations\Messages\Message
 *
 * @phpstan-type MessageSendResponseShape = array{data: Message|MessageShape}
 */
final class MessageSendResponse implements BaseModel
{
    /** @use SdkModel<MessageSendResponseShape> */
    use SdkModel;

    #[Required]
    public Message $data;

    /**
     * `new MessageSendResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessageSendResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MessageSendResponse)->withData(...)
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
     *
     * @param Message|MessageShape $data
     */
    public static function with(Message|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Message|MessageShape $data
     */
    public function withData(Message|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
