<?php

declare(strict_types=1);

namespace Eat518\Customer\Events;

use Eat518\Core\Attributes\Optional;
use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;
use Eat518\Customer\Events\EventFeedItem\Business;

/**
 * @phpstan-import-type BusinessShape from \Eat518\Customer\Events\EventFeedItem\Business
 *
 * @phpstan-type EventFeedItemShape = array{
 *   id: string,
 *   business: Business|BusinessShape,
 *   description: string|null,
 *   endsAt: string,
 *   image: string|null,
 *   isFeatured: bool,
 *   location: string|null,
 *   rsvpCount: int,
 *   startsAt: string,
 *   ticketSalesEnabled: bool,
 *   title: string,
 *   ticketPriceFrom?: string|null,
 *   userHasTickets?: bool|null,
 *   userRsvpStatus?: string|null,
 * }
 */
final class EventFeedItem implements BaseModel
{
    /** @use SdkModel<EventFeedItemShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public Business $business;

    #[Required]
    public ?string $description;

    #[Required('ends_at')]
    public string $endsAt;

    #[Required]
    public ?string $image;

    #[Required('is_featured')]
    public bool $isFeatured;

    #[Required]
    public ?string $location;

    #[Required('rsvp_count')]
    public int $rsvpCount;

    #[Required('starts_at')]
    public string $startsAt;

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
     * `new EventFeedItem()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventFeedItem::with(
     *   id: ...,
     *   business: ...,
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
     * (new EventFeedItem)
     *   ->withID(...)
     *   ->withBusiness(...)
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
     *
     * @param Business|BusinessShape $business
     */
    public static function with(
        string $id,
        Business|array $business,
        ?string $description,
        string $endsAt,
        ?string $image,
        bool $isFeatured,
        ?string $location,
        int $rsvpCount,
        string $startsAt,
        bool $ticketSalesEnabled,
        string $title,
        ?string $ticketPriceFrom = null,
        ?bool $userHasTickets = null,
        ?string $userRsvpStatus = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['business'] = $business;
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

    /**
     * @param Business|BusinessShape $business
     */
    public function withBusiness(Business|array $business): self
    {
        $self = clone $this;
        $self['business'] = $business;

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

    public function withStartsAt(string $startsAt): self
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
