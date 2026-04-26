<?php

declare(strict_types=1);

namespace Eat518\Customer\Events;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Concerns\SdkParams;
use Eat518\Core\Contracts\BaseModel;
use Eat518\Customer\Events\EventCalculatePriceParams\Ticket;

/**
 * Preview the subtotal, platform fee, and total for a given ticket selection.
 *
 * @see Eat518\Services\Customer\EventsService::calculatePrice()
 *
 * @phpstan-import-type TicketShape from \Eat518\Customer\Events\EventCalculatePriceParams\Ticket
 *
 * @phpstan-type EventCalculatePriceParamsShape = array{
 *   tickets: list<Ticket|TicketShape>
 * }
 */
final class EventCalculatePriceParams implements BaseModel
{
    /** @use SdkModel<EventCalculatePriceParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<Ticket> $tickets */
    #[Required(list: Ticket::class)]
    public array $tickets;

    /**
     * `new EventCalculatePriceParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventCalculatePriceParams::with(tickets: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EventCalculatePriceParams)->withTickets(...)
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
     * @param list<Ticket|TicketShape> $tickets
     */
    public static function with(array $tickets): self
    {
        $self = new self;

        $self['tickets'] = $tickets;

        return $self;
    }

    /**
     * @param list<Ticket|TicketShape> $tickets
     */
    public function withTickets(array $tickets): self
    {
        $self = clone $this;
        $self['tickets'] = $tickets;

        return $self;
    }
}
