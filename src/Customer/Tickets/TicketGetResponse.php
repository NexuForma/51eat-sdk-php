<?php

declare(strict_types=1);

namespace Eat518\Customer\Tickets;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type TicketShape from \Eat518\Customer\Tickets\Ticket
 *
 * @phpstan-type TicketGetResponseShape = array{data: Ticket|TicketShape}
 */
final class TicketGetResponse implements BaseModel
{
    /** @use SdkModel<TicketGetResponseShape> */
    use SdkModel;

    #[Required]
    public Ticket $data;

    /**
     * `new TicketGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TicketGetResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TicketGetResponse)->withData(...)
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
     * @param Ticket|TicketShape $data
     */
    public static function with(Ticket|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Ticket|TicketShape $data
     */
    public function withData(Ticket|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
