<?php

declare(strict_types=1);

namespace Eat518\Customer\Messaging\Conversations\Messages;

use Eat518\Core\Attributes\Optional;
use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;
use Eat518\Customer\Messaging\Conversations\Messages\Message\Sender;

/**
 * @phpstan-import-type SenderShape from \Eat518\Customer\Messaging\Conversations\Messages\Message\Sender
 *
 * @phpstan-type MessageShape = array{
 *   id: string,
 *   content: string,
 *   conversationID: string,
 *   createdAt: string,
 *   editedAt: string,
 *   isEdited: bool,
 *   messageType: string,
 *   metadata: list<mixed>|null,
 *   senderID: string,
 *   updatedAt: string,
 *   sender?: null|Sender|SenderShape,
 * }
 */
final class Message implements BaseModel
{
    /** @use SdkModel<MessageShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public string $content;

    #[Required('conversation_id')]
    public string $conversationID;

    #[Required('created_at')]
    public string $createdAt;

    #[Required('edited_at')]
    public string $editedAt;

    #[Required('is_edited')]
    public bool $isEdited;

    #[Required('message_type')]
    public string $messageType;

    /** @var list<mixed>|null $metadata */
    #[Required(list: 'mixed')]
    public ?array $metadata;

    #[Required('sender_id')]
    public string $senderID;

    #[Required('updated_at')]
    public string $updatedAt;

    #[Optional]
    public ?Sender $sender;

    /**
     * `new Message()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Message::with(
     *   id: ...,
     *   content: ...,
     *   conversationID: ...,
     *   createdAt: ...,
     *   editedAt: ...,
     *   isEdited: ...,
     *   messageType: ...,
     *   metadata: ...,
     *   senderID: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Message)
     *   ->withID(...)
     *   ->withContent(...)
     *   ->withConversationID(...)
     *   ->withCreatedAt(...)
     *   ->withEditedAt(...)
     *   ->withIsEdited(...)
     *   ->withMessageType(...)
     *   ->withMetadata(...)
     *   ->withSenderID(...)
     *   ->withUpdatedAt(...)
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
     * @param list<mixed>|null $metadata
     * @param Sender|SenderShape|null $sender
     */
    public static function with(
        string $id,
        string $content,
        string $conversationID,
        string $createdAt,
        string $editedAt,
        bool $isEdited,
        string $messageType,
        ?array $metadata,
        string $senderID,
        string $updatedAt,
        Sender|array|null $sender = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['content'] = $content;
        $self['conversationID'] = $conversationID;
        $self['createdAt'] = $createdAt;
        $self['editedAt'] = $editedAt;
        $self['isEdited'] = $isEdited;
        $self['messageType'] = $messageType;
        $self['metadata'] = $metadata;
        $self['senderID'] = $senderID;
        $self['updatedAt'] = $updatedAt;

        null !== $sender && $self['sender'] = $sender;

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

    public function withConversationID(string $conversationID): self
    {
        $self = clone $this;
        $self['conversationID'] = $conversationID;

        return $self;
    }

    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withEditedAt(string $editedAt): self
    {
        $self = clone $this;
        $self['editedAt'] = $editedAt;

        return $self;
    }

    public function withIsEdited(bool $isEdited): self
    {
        $self = clone $this;
        $self['isEdited'] = $isEdited;

        return $self;
    }

    public function withMessageType(string $messageType): self
    {
        $self = clone $this;
        $self['messageType'] = $messageType;

        return $self;
    }

    /**
     * @param list<mixed>|null $metadata
     */
    public function withMetadata(?array $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }

    public function withSenderID(string $senderID): self
    {
        $self = clone $this;
        $self['senderID'] = $senderID;

        return $self;
    }

    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * @param Sender|SenderShape $sender
     */
    public function withSender(Sender|array $sender): self
    {
        $self = clone $this;
        $self['sender'] = $sender;

        return $self;
    }
}
