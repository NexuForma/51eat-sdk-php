<?php

declare(strict_types=1);

namespace Eat518\Customer\Rsvps\RsvpListResponse\Data;

use Eat518\Core\Attributes\Optional;
use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;
use Eat518\Customer\Rsvps\RsvpListResponse\Data\Rsvp\Event;

/**
 * @phpstan-import-type EventShape from \Eat518\Customer\Rsvps\RsvpListResponse\Data\Rsvp\Event
 *
 * @phpstan-type RsvpShape = array{
 *   id: string,
 *   createdAt: string,
 *   notes: string|null,
 *   status: string,
 *   updatedAt: string,
 *   event?: null|Event|EventShape,
 * }
 */
final class Rsvp implements BaseModel
{
    /** @use SdkModel<RsvpShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required('created_at')]
    public string $createdAt;

    #[Required]
    public ?string $notes;

    #[Required]
    public string $status;

    #[Required('updated_at')]
    public string $updatedAt;

    #[Optional]
    public ?Event $event;

    /**
     * `new Rsvp()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Rsvp::with(id: ..., createdAt: ..., notes: ..., status: ..., updatedAt: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Rsvp)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withNotes(...)
     *   ->withStatus(...)
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
     * @param Event|EventShape|null $event
     */
    public static function with(
        string $id,
        string $createdAt,
        ?string $notes,
        string $status,
        string $updatedAt,
        Event|array|null $event = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['notes'] = $notes;
        $self['status'] = $status;
        $self['updatedAt'] = $updatedAt;

        null !== $event && $self['event'] = $event;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withNotes(?string $notes): self
    {
        $self = clone $this;
        $self['notes'] = $notes;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * @param Event|EventShape $event
     */
    public function withEvent(Event|array $event): self
    {
        $self = clone $this;
        $self['event'] = $event;

        return $self;
    }
}
