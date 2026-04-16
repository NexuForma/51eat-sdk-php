<?php

declare(strict_types=1);

namespace Eat518\Customer\Events\EventCalculatePriceParams;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;

/**
 * @phpstan-type TicketShape = array{quantity: int, ticketTypeID: string}
 */
final class Ticket implements BaseModel
{
    /** @use SdkModel<TicketShape> */
    use SdkModel;

    #[Required]
    public int $quantity;

    #[Required('ticket_type_id')]
    public string $ticketTypeID;

    /**
     * `new Ticket()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Ticket::with(quantity: ..., ticketTypeID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Ticket)->withQuantity(...)->withTicketTypeID(...)
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
    public static function with(int $quantity, string $ticketTypeID): self
    {
        $self = new self;

        $self['quantity'] = $quantity;
        $self['ticketTypeID'] = $ticketTypeID;

        return $self;
    }

    public function withQuantity(int $quantity): self
    {
        $self = clone $this;
        $self['quantity'] = $quantity;

        return $self;
    }

    public function withTicketTypeID(string $ticketTypeID): self
    {
        $self = clone $this;
        $self['ticketTypeID'] = $ticketTypeID;

        return $self;
    }
}
