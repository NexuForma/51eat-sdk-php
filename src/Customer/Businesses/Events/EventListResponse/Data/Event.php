<?php

declare(strict_types=1);

namespace Eat518\Customer\Businesses\Events\EventListResponse\Data;

use Eat518\Core\Attributes\Optional;
use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;

/**
 * @phpstan-type EventShape = array{
 *   id: string,
 *   description: string|null,
 *   endsAt: \DateTimeInterface,
 *   image: string|null,
 *   isFeatured: bool,
 *   location: string|null,
 *   rsvpCount: int,
 *   startsAt: \DateTimeInterface,
 *   ticketSalesEnabled: bool,
 *   title: string,
 *   ticketPriceFrom?: string|null,
 *   userHasTickets?: bool|null,
 *   userRsvpStatus?: string|null,
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
    public ?string $image;

    #[Required('is_featured')]
    public bool $isFeatured;

    #[Required]
    public ?string $location;

    #[Required('rsvp_count')]
    public int $rsvpCount;

    #[Required('starts_at')]
    public \DateTimeInterface $startsAt;

    #[Required('ticket_sales_enabled')]
    public bool $ticketSalesEnabled;

    #[Required]
    public string $title;

    #[Optional('ticket_price_from')]
    public ?string $ticketPriceFrom;

    #[Optional('user_has_tickets')]
    public ?bool $userHasTickets;

    #[Optional('user_rsvp_status')]
    public ?string $userRsvpStatus;

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
     *   isFeatured: ...,
     *   location: ...,
     *   rsvpCount: ...,
     *   startsAt: ...,
     *   ticketSalesEnabled: ...,
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
     *   ->withIsFeatured(...)
     *   ->withLocation(...)
     *   ->withRsvpCount(...)
     *   ->withStartsAt(...)
     *   ->withTicketSalesEnabled(...)
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
        ?string $image,
        bool $isFeatured,
        ?string $location,
        int $rsvpCount,
        \DateTimeInterface $startsAt,
        bool $ticketSalesEnabled,
        string $title,
        ?string $ticketPriceFrom = null,
        ?bool $userHasTickets = null,
        ?string $userRsvpStatus = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['description'] = $description;
        $self['endsAt'] = $endsAt;
        $self['image'] = $image;
        $self['isFeatured'] = $isFeatured;
        $self['location'] = $location;
        $self['rsvpCount'] = $rsvpCount;
        $self['startsAt'] = $startsAt;
        $self['ticketSalesEnabled'] = $ticketSalesEnabled;
        $self['title'] = $title;

        null !== $ticketPriceFrom && $self['ticketPriceFrom'] = $ticketPriceFrom;
        null !== $userHasTickets && $self['userHasTickets'] = $userHasTickets;
        null !== $userRsvpStatus && $self['userRsvpStatus'] = $userRsvpStatus;

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

    public function withImage(?string $image): self
    {
        $self = clone $this;
        $self['image'] = $image;

        return $self;
    }

    public function withIsFeatured(bool $isFeatured): self
    {
        $self = clone $this;
        $self['isFeatured'] = $isFeatured;

        return $self;
    }

    public function withLocation(?string $location): self
    {
        $self = clone $this;
        $self['location'] = $location;

        return $self;
    }

    public function withRsvpCount(int $rsvpCount): self
    {
        $self = clone $this;
        $self['rsvpCount'] = $rsvpCount;

        return $self;
    }

    public function withStartsAt(\DateTimeInterface $startsAt): self
    {
        $self = clone $this;
        $self['startsAt'] = $startsAt;

        return $self;
    }

    public function withTicketSalesEnabled(bool $ticketSalesEnabled): self
    {
        $self = clone $this;
        $self['ticketSalesEnabled'] = $ticketSalesEnabled;

        return $self;
    }

    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }

    public function withTicketPriceFrom(string $ticketPriceFrom): self
    {
        $self = clone $this;
        $self['ticketPriceFrom'] = $ticketPriceFrom;

        return $self;
    }

    public function withUserHasTickets(bool $userHasTickets): self
    {
        $self = clone $this;
        $self['userHasTickets'] = $userHasTickets;

        return $self;
    }

    public function withUserRsvpStatus(string $userRsvpStatus): self
    {
        $self = clone $this;
        $self['userRsvpStatus'] = $userRsvpStatus;

        return $self;
    }
}
