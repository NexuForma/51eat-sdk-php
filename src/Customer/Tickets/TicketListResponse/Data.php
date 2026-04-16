<?php

declare(strict_types=1);

namespace Eat518\Customer\Tickets\TicketListResponse;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;
use Eat518\Customer\Businesses\Pagination;
use Eat518\Customer\Tickets\Ticket;

/**
 * @phpstan-import-type PaginationShape from \Eat518\Customer\Businesses\Pagination
 * @phpstan-import-type TicketShape from \Eat518\Customer\Tickets\Ticket
 *
 * @phpstan-type DataShape = array{
 *   pagination: Pagination|PaginationShape, tickets: list<Ticket|TicketShape>
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required]
    public Pagination $pagination;

    /** @var list<Ticket> $tickets */
    #[Required(list: Ticket::class)]
    public array $tickets;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(pagination: ..., tickets: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withPagination(...)->withTickets(...)
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
     * @param Pagination|PaginationShape $pagination
     * @param list<Ticket|TicketShape> $tickets
     */
    public static function with(
        Pagination|array $pagination,
        array $tickets
    ): self {
        $self = new self;

        $self['pagination'] = $pagination;
        $self['tickets'] = $tickets;

        return $self;
    }

    /**
     * @param Pagination|PaginationShape $pagination
     */
    public function withPagination(Pagination|array $pagination): self
    {
        $self = clone $this;
        $self['pagination'] = $pagination;

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
