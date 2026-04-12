<?php

declare(strict_types=1);

namespace Eat518\Customer\Businesses\BusinessGetEventsResponse\Data;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;

/**
 * @phpstan-type EventShape = array{
 *   id: string,
 *   description: string|null,
 *   endsAt: \DateTimeInterface,
 *   image: string,
 *   startsAt: \DateTimeInterface,
 *   title: string,
 * }
 */
final class Event implements BaseModel
{
    /** @use SdkModel<EventShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public ?string $description;

    #[Required('ends_at')]
    public \DateTimeInterface $endsAt;

    #[Required]
    public string $image;

    #[Required('starts_at')]
    public \DateTimeInterface $startsAt;

    #[Required]
    public string $title;

    /**
     * `new Event()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Event::with(
     *   id: ..., description: ..., endsAt: ..., image: ..., startsAt: ..., title: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Event)
     *   ->withID(...)
     *   ->withDescription(...)
     *   ->withEndsAt(...)
     *   ->withImage(...)
     *   ->withStartsAt(...)
     *   ->withTitle(...)
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
        ?string $description,
        \DateTimeInterface $endsAt,
        string $image,
        \DateTimeInterface $startsAt,
        string $title,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['description'] = $description;
        $self['endsAt'] = $endsAt;
        $self['image'] = $image;
        $self['startsAt'] = $startsAt;
        $self['title'] = $title;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withDescription(?string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withEndsAt(\DateTimeInterface $endsAt): self
    {
        $self = clone $this;
        $self['endsAt'] = $endsAt;

        return $self;
    }

    public function withImage(string $image): self
    {
        $self = clone $this;
        $self['image'] = $image;

        return $self;
    }

    public function withStartsAt(\DateTimeInterface $startsAt): self
    {
        $self = clone $this;
        $self['startsAt'] = $startsAt;

        return $self;
    }

    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }
}
