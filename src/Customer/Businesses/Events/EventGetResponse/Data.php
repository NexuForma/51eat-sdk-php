<?php

declare(strict_types=1);

namespace Eat518\Customer\Businesses\Events\EventGetResponse;

use Eat518\Core\Attributes\Optional;
use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;
use Eat518\Customer\Businesses\Events\EventGetResponse\Data\TicketType;

/**
 * @phpstan-import-type TicketTypeShape from \Eat518\Customer\Businesses\Events\EventGetResponse\Data\TicketType
 *
 * @phpstan-type DataShape = array{
 *   id: string,
 *   description: string,
 *   endsAt: string,
 *   image: string,
 *   isFeatured: string,
 *   location: string,
 *   rsvpCount: string,
 *   startsAt: string,
 *   ticketSalesEnabled: string,
 *   title: string,
 *   ticketPriceFrom?: string|null,
 *   ticketTypes?: list<TicketType|TicketTypeShape>|null,
 *   userHasTickets?: bool|null,
 *   userRsvpStatus?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public string $description;

    #[Required('ends_at')]
    public string $endsAt;

    #[Required]
    public string $image;

    #[Required('is_featured')]
    public string $isFeatured;

    #[Required]
    public string $location;

    #[Required('rsvp_count')]
    public string $rsvpCount;

    #[Required('starts_at')]
    public string $startsAt;

    #[Required('ticket_sales_enabled')]
    public string $ticketSalesEnabled;

    #[Required]
    public string $title;

    #[Optional('ticket_price_from')]
    public ?string $ticketPriceFrom;

    /** @var list<TicketType>|null $ticketTypes */
    #[Optional('ticket_types', list: TicketType::class)]
    public ?array $ticketTypes;

    #[Optional('user_has_tickets')]
    public ?bool $userHasTickets;

    #[Optional('user_rsvp_status')]
    public ?string $userRsvpStatus;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
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
     * (new Data)
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
     *
     * @param list<TicketType|TicketTypeShape>|null $ticketTypes
     */
    public static function with(
        string $id,
        string $description,
        string $endsAt,
        string $image,
        string $isFeatured,
        string $location,
        string $rsvpCount,
        string $startsAt,
        string $ticketSalesEnabled,
        string $title,
        ?string $ticketPriceFrom = null,
        ?array $ticketTypes = null,
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
        null !== $ticketTypes && $self['ticketTypes'] = $ticketTypes;
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

    public function withIsFeatured(string $isFeatured): self
    {
        $self = clone $this;
        $self['isFeatured'] = $isFeatured;

        return $self;
    }

    public function withLocation(string $location): self
    {
        $self = clone $this;
        $self['location'] = $location;

        return $self;
    }

    public function withRsvpCount(string $rsvpCount): self
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

    public function withTicketSalesEnabled(string $ticketSalesEnabled): self
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

    /**
     * @param list<TicketType|TicketTypeShape> $ticketTypes
     */
    public function withTicketTypes(array $ticketTypes): self
    {
        $self = clone $this;
        $self['ticketTypes'] = $ticketTypes;

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
