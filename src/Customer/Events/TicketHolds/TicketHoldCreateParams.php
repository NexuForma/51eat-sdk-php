<?php

declare(strict_types=1);

namespace Eat518\Customer\Events\TicketHolds;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Concerns\SdkParams;
use Eat518\Core\Contracts\BaseModel;
use Eat518\Customer\Events\TicketHolds\TicketHoldCreateParams\Ticket;

/**
 * Place a temporary hold on tickets for the specified event. Holds expire after 10 minutes.
 *
 * @see Eat518\Services\Customer\Events\TicketHoldsService::create()
 *
 * @phpstan-import-type TicketShape from \Eat518\Customer\Events\TicketHolds\TicketHoldCreateParams\Ticket
 *
 * @phpstan-type TicketHoldCreateParamsShape = array{
 *   tickets: list<Ticket|TicketShape>
 * }
 */
final class TicketHoldCreateParams implements BaseModel
{
    /** @use SdkModel<TicketHoldCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<Ticket> $tickets */
    #[Required(list: Ticket::class)]
    public array $tickets;

    /**
     * `new TicketHoldCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TicketHoldCreateParams::with(tickets: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TicketHoldCreateParams)->withTickets(...)
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
