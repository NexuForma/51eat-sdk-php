<?php

declare(strict_types=1);

namespace Eat518\Customer\Messaging\Conversations;

use Eat518\Core\Attributes\Optional;
use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;
use Eat518\Customer\Messaging\Conversations\Conversation\Business;
use Eat518\Customer\Messaging\Conversations\Conversation\LastMessage;

/**
 * @phpstan-import-type BusinessShape from \Eat518\Customer\Messaging\Conversations\Conversation\Business
 * @phpstan-import-type LastMessageShape from \Eat518\Customer\Messaging\Conversations\Conversation\LastMessage
 *
 * @phpstan-type ConversationShape = array{
 *   id: string,
 *   business: Business|BusinessShape,
 *   createdAt: string,
 *   lastMessageAt: string|null,
 *   updatedAt: string,
 *   lastMessage?: null|LastMessage|LastMessageShape,
 * }
 */
final class Conversation implements BaseModel
{
    /** @use SdkModel<ConversationShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public Business $business;

    #[Required('created_at')]
    public string $createdAt;

    #[Required('last_message_at')]
    public ?string $lastMessageAt;

    #[Required('updated_at')]
    public string $updatedAt;

    #[Optional('last_message', nullable: true)]
    public ?LastMessage $lastMessage;

    /**
     * `new Conversation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Conversation::with(
     *   id: ..., business: ..., createdAt: ..., lastMessageAt: ..., updatedAt: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Conversation)
     *   ->withID(...)
     *   ->withBusiness(...)
     *   ->withCreatedAt(...)
     *   ->withLastMessageAt(...)
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
     * @param Business|BusinessShape $business
     * @param LastMessage|LastMessageShape|null $lastMessage
     */
    public static function with(
        string $id,
        Business|array $business,
        string $createdAt,
        ?string $lastMessageAt,
        string $updatedAt,
        LastMessage|array|null $lastMessage = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['business'] = $business;
        $self['createdAt'] = $createdAt;
        $self['lastMessageAt'] = $lastMessageAt;
        $self['updatedAt'] = $updatedAt;

        null !== $lastMessage && $self['lastMessage'] = $lastMessage;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param Business|BusinessShape $business
     */
    public function withBusiness(Business|array $business): self
    {
        $self = clone $this;
        $self['business'] = $business;

        return $self;
    }

    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withLastMessageAt(?string $lastMessageAt): self
    {
        $self = clone $this;
        $self['lastMessageAt'] = $lastMessageAt;

        return $self;
    }

    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * @param LastMessage|LastMessageShape|null $lastMessage
     */
    public function withLastMessage(LastMessage|array|null $lastMessage): self
    {
        $self = clone $this;
        $self['lastMessage'] = $lastMessage;

        return $self;
    }
}
