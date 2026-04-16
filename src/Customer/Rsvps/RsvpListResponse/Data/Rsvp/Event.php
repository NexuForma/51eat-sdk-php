<?php

declare(strict_types=1);

namespace Eat518\Customer\Rsvps\RsvpListResponse\Data\Rsvp;

use Eat518\Core\Attributes\Optional;
use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;
use Eat518\Customer\Rsvps\RsvpListResponse\Data\Rsvp\Event\Business;

/**
 * @phpstan-import-type BusinessShape from \Eat518\Customer\Rsvps\RsvpListResponse\Data\Rsvp\Event\Business
 *
 * @phpstan-type EventShape = array{
 *   id: string,
 *   description: string,
 *   endsAt: string,
 *   image: string,
 *   isAllDay: string,
 *   location: string,
 *   startsAt: string,
 *   title: string,
 *   business?: null|Business|BusinessShape,
 * }
 */
final class Event implements BaseModel
{
    /** @use SdkModel<EventShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public string $description;

    #[Required('ends_at')]
    public string $endsAt;

    #[Required]
    public string $image;

    #[Required('is_all_day')]
    public string $isAllDay;

    #[Required]
    public string $location;

    #[Required('starts_at')]
    public string $startsAt;

    #[Required]
    public string $title;

    #[Optional]
    public ?Business $business;

    /**
     * `new Event()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Event::with(
     *   id: ...,
     *   description: ...,
     *   endsAt: ...,
     *   image: ...,
     *   isAllDay: ...,
     *   location: ...,
     *   startsAt: ...,
     *   title: ...,
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
     *   ->withIsAllDay(...)
     *   ->withLocation(...)
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
     *
     * @param Business|BusinessShape|null $business
     */
    public static function with(
        string $id,
        string $description,
        string $endsAt,
        string $image,
        string $isAllDay,
        string $location,
        string $startsAt,
        string $title,
        Business|array|null $business = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['description'] = $description;
        $self['endsAt'] = $endsAt;
        $self['image'] = $image;
        $self['isAllDay'] = $isAllDay;
        $self['location'] = $location;
        $self['startsAt'] = $startsAt;
        $self['title'] = $title;

        null !== $business && $self['business'] = $business;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withEndsAt(string $endsAt): self
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

    public function withIsAllDay(string $isAllDay): self
    {
        $self = clone $this;
        $self['isAllDay'] = $isAllDay;

        return $self;
    }

    public function withLocation(string $location): self
    {
        $self = clone $this;
        $self['location'] = $location;

        return $self;
    }

    public function withStartsAt(string $startsAt): self
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

    /**
     * @param Business|BusinessShape $business
     */
    public function withBusiness(Business|array $business): self
    {
        $self = clone $this;
        $self['business'] = $business;

        return $self;
    }
}
