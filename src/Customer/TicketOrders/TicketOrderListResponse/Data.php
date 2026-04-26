<?php

declare(strict_types=1);

namespace Eat518\Customer\TicketOrders\TicketOrderListResponse;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;
use Eat518\Customer\Businesses\Pagination;
use Eat518\Customer\TicketOrders\TicketOrder;

/**
 * @phpstan-import-type TicketOrderShape from \Eat518\Customer\TicketOrders\TicketOrder
 * @phpstan-import-type PaginationShape from \Eat518\Customer\Businesses\Pagination
 *
 * @phpstan-type DataShape = array{
 *   orders: list<TicketOrder|TicketOrderShape>,
 *   pagination: Pagination|PaginationShape,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /** @var list<TicketOrder> $orders */
    #[Required(list: TicketOrder::class)]
    public array $orders;

    #[Required]
    public Pagination $pagination;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(orders: ..., pagination: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withOrders(...)->withPagination(...)
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
     * @param list<TicketOrder|TicketOrderShape> $orders
     * @param Pagination|PaginationShape $pagination
     */
    public static function with(
        array $orders,
        Pagination|array $pagination
    ): self {
        $self = new self;

        $self['orders'] = $orders;
        $self['pagination'] = $pagination;

        return $self;
    }

    /**
     * @param list<TicketOrder|TicketOrderShape> $orders
     */
    public function withOrders(array $orders): self
    {
        $self = clone $this;
        $self['orders'] = $orders;

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
}
