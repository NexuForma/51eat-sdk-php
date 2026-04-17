<?php

declare(strict_types=1);

namespace Eat518\Customer\Rsvps\RsvpListResponse\Data\Rsvp;

use Eat518\Core\Attributes\Optional;
use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;
use Eat518\Customer\Businesses\BusinessProfile;

/**
 * @phpstan-import-type BusinessProfileShape from \Eat518\Customer\Businesses\BusinessProfile
 *
 * @phpstan-type EventShape = array{
 *   id: string,
 *   description: string|null,
 *   endsAt: string,
 *   image: string|null,
 *   isAllDay: bool,
 *   location: string|null,
 *   startsAt: string,
 *   title: string,
 *   business?: null|BusinessProfile|BusinessProfileShape,
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
    public string $endsAt;

    #[Required]
    public ?string $image;

    #[Required('is_all_day')]
    public bool $isAllDay;

    #[Required]
    public ?string $location;

    #[Required('starts_at')]
    public string $startsAt;

    #[Required]
    public string $title;

    #[Optional]
    public ?BusinessProfile $business;

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
     * @param BusinessProfile|BusinessProfileShape|null $business
     */
    public static function with(
        string $id,
        ?string $description,
        string $endsAt,
        ?string $image,
        bool $isAllDay,
        ?string $location,
        string $startsAt,
        string $title,
        BusinessProfile|array|null $business = null,
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

    public function withDescription(?string $description): self
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

    public function withImage(?string $image): self
    {
        $self = clone $this;
        $self['image'] = $image;

        return $self;
    }

    public function withIsAllDay(bool $isAllDay): self
    {
        $self = clone $this;
        $self['isAllDay'] = $isAllDay;

        return $self;
    }

    public function withLocation(?string $location): self
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
     * @param BusinessProfile|BusinessProfileShape $business
     */
    public function withBusiness(BusinessProfile|array $business): self
    {
        $self = clone $this;
        $self['business'] = $business;

        return $self;
    }
}
