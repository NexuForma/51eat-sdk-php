<?php

declare(strict_types=1);

namespace Eat518\Customer\Events\TicketHolds;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;
use Eat518\Customer\Events\TicketHolds\TicketHoldNewResponse\Data;

/**
 * @phpstan-import-type DataShape from \Eat518\Customer\Events\TicketHolds\TicketHoldNewResponse\Data
 *
 * @phpstan-type TicketHoldNewResponseShape = array{data: Data|DataShape}
 */
final class TicketHoldNewResponse implements BaseModel
{
    /** @use SdkModel<TicketHoldNewResponseShape> */
    use SdkModel;

    #[Required]
    public Data $data;

    /**
     * `new TicketHoldNewResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TicketHoldNewResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TicketHoldNewResponse)->withData(...)
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
     * @param Data|DataShape $data
     */
    public static function with(Data|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Data|DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
