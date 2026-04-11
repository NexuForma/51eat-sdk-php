<?php

declare(strict_types=1);

namespace Eat518\Customer\Messaging\Conversations\Conversation;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;

/**
 * @phpstan-type LastMessageShape = array{
 *   id: string, content: string, createdAt: string, senderType: string
 * }
 */
final class LastMessage implements BaseModel
{
    /** @use SdkModel<LastMessageShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public string $content;

    #[Required('created_at')]
    public string $createdAt;

    #[Required('sender_type')]
    public string $senderType;

    /**
     * `new LastMessage()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LastMessage::with(id: ..., content: ..., createdAt: ..., senderType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LastMessage)
     *   ->withID(...)
     *   ->withContent(...)
     *   ->withCreatedAt(...)
     *   ->withSenderType(...)
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
        string $id,
        string $content,
        string $createdAt,
        string $senderType
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['content'] = $content;
        $self['createdAt'] = $createdAt;
        $self['senderType'] = $senderType;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withContent(string $content): self
    {
        $self = clone $this;
        $self['content'] = $content;

        return $self;
    }

    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withSenderType(string $senderType): self
    {
        $self = clone $this;
        $self['senderType'] = $senderType;

        return $self;
    }
}
