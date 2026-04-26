<?php

declare(strict_types=1);

namespace Eat518\Customer\TicketOrders;

use Eat518\Core\Attributes\Optional;
use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;
use Eat518\Customer\Tickets\Ticket;

/**
 * @phpstan-import-type TicketShape from \Eat518\Customer\Tickets\Ticket
 *
 * @phpstan-type TicketOrderShape = array{
 *   id: string,
 *   customerEmail: string,
 *   customerName: string,
 *   fees: string,
 *   orderNumber: string,
 *   paymentCompletedAt: string,
 *   status: string,
 *   subtotal: string,
 *   totalAmount: string,
 *   tickets?: list<Ticket|TicketShape>|null,
 * }
 */
final class TicketOrder implements BaseModel
{
    /** @use SdkModel<TicketOrderShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required('customer_email')]
    public string $customerEmail;

    #[Required('customer_name')]
    public string $customerName;

    #[Required]
    public string $fees;

    #[Required('order_number')]
    public string $orderNumber;

    #[Required('payment_completed_at')]
    public string $paymentCompletedAt;

    #[Required]
    public string $status;

    #[Required]
    public string $subtotal;

    #[Required('total_amount')]
    public string $totalAmount;

    /** @var list<Ticket>|null $tickets */
    #[Optional(list: Ticket::class)]
    public ?array $tickets;

    /**
     * `new TicketOrder()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TicketOrder::with(
     *   id: ...,
     *   customerEmail: ...,
     *   customerName: ...,
     *   fees: ...,
     *   orderNumber: ...,
     *   paymentCompletedAt: ...,
     *   status: ...,
     *   subtotal: ...,
     *   totalAmount: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TicketOrder)
     *   ->withID(...)
     *   ->withCustomerEmail(...)
     *   ->withCustomerName(...)
     *   ->withFees(...)
     *   ->withOrderNumber(...)
     *   ->withPaymentCompletedAt(...)
     *   ->withStatus(...)
     *   ->withSubtotal(...)
     *   ->withTotalAmount(...)
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
     * @param list<Ticket|TicketShape>|null $tickets
     */
    public static function with(
        string $id,
        string $customerEmail,
        string $customerName,
        string $fees,
        string $orderNumber,
        string $paymentCompletedAt,
        string $status,
        string $subtotal,
        string $totalAmount,
        ?array $tickets = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['customerEmail'] = $customerEmail;
        $self['customerName'] = $customerName;
        $self['fees'] = $fees;
        $self['orderNumber'] = $orderNumber;
        $self['paymentCompletedAt'] = $paymentCompletedAt;
        $self['status'] = $status;
        $self['subtotal'] = $subtotal;
        $self['totalAmount'] = $totalAmount;

        null !== $tickets && $self['tickets'] = $tickets;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCustomerEmail(string $customerEmail): self
    {
        $self = clone $this;
        $self['customerEmail'] = $customerEmail;

        return $self;
    }

    public function withCustomerName(string $customerName): self
    {
        $self = clone $this;
        $self['customerName'] = $customerName;

        return $self;
    }

    public function withFees(string $fees): self
    {
        $self = clone $this;
        $self['fees'] = $fees;

        return $self;
    }

    public function withOrderNumber(string $orderNumber): self
    {
        $self = clone $this;
        $self['orderNumber'] = $orderNumber;

        return $self;
    }

    public function withPaymentCompletedAt(string $paymentCompletedAt): self
    {
        $self = clone $this;
        $self['paymentCompletedAt'] = $paymentCompletedAt;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withSubtotal(string $subtotal): self
    {
        $self = clone $this;
        $self['subtotal'] = $subtotal;

        return $self;
    }

    public function withTotalAmount(string $totalAmount): self
    {
        $self = clone $this;
        $self['totalAmount'] = $totalAmount;

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
