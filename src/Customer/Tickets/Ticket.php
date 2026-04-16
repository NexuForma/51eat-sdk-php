<?php

declare(strict_types=1);

namespace Eat518\Customer\Tickets;

use Eat518\Core\Attributes\Optional;
use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;
use Eat518\Customer\Tickets\Ticket\TicketType;

/**
 * @phpstan-import-type TicketTypeShape from \Eat518\Customer\Tickets\Ticket\TicketType
 *
 * @phpstan-type TicketShape = array{
 *   id: string,
 *   qrCode: string,
 *   status: string,
 *   ticketNumber: string,
 *   usedAt: string,
 *   ticketType?: null|TicketType|TicketTypeShape,
 * }
 */
final class Ticket implements BaseModel
{
    /** @use SdkModel<TicketShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required('qr_code')]
    public string $qrCode;

    #[Required]
    public string $status;

    #[Required('ticket_number')]
    public string $ticketNumber;

    #[Required('used_at')]
    public string $usedAt;

    #[Optional('ticket_type')]
    public ?TicketType $ticketType;

    /**
     * `new Ticket()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Ticket::with(id: ..., qrCode: ..., status: ..., ticketNumber: ..., usedAt: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Ticket)
     *   ->withID(...)
     *   ->withQrCode(...)
     *   ->withStatus(...)
     *   ->withTicketNumber(...)
     *   ->withUsedAt(...)
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
     * @param TicketType|TicketTypeShape|null $ticketType
     */
    public static function with(
        string $id,
        string $qrCode,
        string $status,
        string $ticketNumber,
        string $usedAt,
        TicketType|array|null $ticketType = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['qrCode'] = $qrCode;
        $self['status'] = $status;
        $self['ticketNumber'] = $ticketNumber;
        $self['usedAt'] = $usedAt;

        null !== $ticketType && $self['ticketType'] = $ticketType;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withQrCode(string $qrCode): self
    {
        $self = clone $this;
        $self['qrCode'] = $qrCode;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withTicketNumber(string $ticketNumber): self
    {
        $self = clone $this;
        $self['ticketNumber'] = $ticketNumber;

        return $self;
    }

    public function withUsedAt(string $usedAt): self
    {
        $self = clone $this;
        $self['usedAt'] = $usedAt;

        return $self;
    }

    /**
     * @param TicketType|TicketTypeShape $ticketType
     */
    public function withTicketType(TicketType|array $ticketType): self
    {
        $self = clone $this;
        $self['ticketType'] = $ticketType;

        return $self;
    }
}
