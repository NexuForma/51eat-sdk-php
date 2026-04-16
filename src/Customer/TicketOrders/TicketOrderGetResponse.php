<?php

declare(strict_types=1);

namespace Eat518\Customer\TicketOrders;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type TicketOrderShape from \Eat518\Customer\TicketOrders\TicketOrder
 *
 * @phpstan-type TicketOrderGetResponseShape = array{
 *   data: TicketOrder|TicketOrderShape
 * }
 */
final class TicketOrderGetResponse implements BaseModel
{
    /** @use SdkModel<TicketOrderGetResponseShape> */
    use SdkModel;

    #[Required]
    public TicketOrder $data;

    /**
     * `new TicketOrderGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TicketOrderGetResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TicketOrderGetResponse)->withData(...)
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
     * @param TicketOrder|TicketOrderShape $data
     */
    public static function with(TicketOrder|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param TicketOrder|TicketOrderShape $data
     */
    public function withData(TicketOrder|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
