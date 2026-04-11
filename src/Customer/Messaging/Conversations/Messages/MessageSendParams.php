<?php

declare(strict_types=1);

namespace Eat518\Customer\Messaging\Conversations\Messages;

use Eat518\Core\Attributes\Optional;
use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Concerns\SdkParams;
use Eat518\Core\Contracts\BaseModel;

/**
 * Send a new message to a specific conversation. The message will be marked
 * as sent by the authenticated customer.
 *
 * @see Eat518\Services\Customer\Messaging\Conversations\MessagesService::send()
 *
 * @phpstan-type MessageSendParamsShape = array{
 *   content: string, messageType?: string|null, metadata?: mixed
 * }
 */
final class MessageSendParams implements BaseModel
{
    /** @use SdkModel<MessageSendParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The message content.
     */
    #[Required]
    public string $content;

    /**
     * The type of message.
     */
    #[Optional('message_type')]
    public ?string $messageType;

    /**
     * Additional metadata for the message.
     */
    #[Optional]
    public mixed $metadata;

    /**
     * `new MessageSendParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessageSendParams::with(content: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MessageSendParams)->withContent(...)
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
    public static function with(
        string $content,
        ?string $messageType = null,
        mixed $metadata = null
    ): self {
        $self = new self;

        $self['content'] = $content;

        null !== $messageType && $self['messageType'] = $messageType;
        null !== $metadata && $self['metadata'] = $metadata;

        return $self;
    }

    /**
     * The message content.
     */
    public function withContent(string $content): self
    {
        $self = clone $this;
        $self['content'] = $content;

        return $self;
    }

    /**
     * The type of message.
     */
    public function withMessageType(string $messageType): self
    {
        $self = clone $this;
        $self['messageType'] = $messageType;

        return $self;
    }

    /**
     * Additional metadata for the message.
     */
    public function withMetadata(mixed $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }
}
