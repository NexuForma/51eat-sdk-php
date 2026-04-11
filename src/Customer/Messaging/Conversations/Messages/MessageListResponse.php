<?php

declare(strict_types=1);

namespace Eat518\Customer\Messaging\Conversations\Messages;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type MessageShape from \Eat518\Customer\Messaging\Conversations\Messages\Message
 *
 * @phpstan-type MessageListResponseShape = array{data: list<Message|MessageShape>}
 */
final class MessageListResponse implements BaseModel
{
    /** @use SdkModel<MessageListResponseShape> */
    use SdkModel;

    /** @var list<Message> $data */
    #[Required(list: Message::class)]
    public array $data;

    /**
     * `new MessageListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessageListResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MessageListResponse)->withData(...)
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
     * @param list<Message|MessageShape> $data
     */
    public static function with(array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<Message|MessageShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
