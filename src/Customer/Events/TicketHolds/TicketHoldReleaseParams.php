<?php

declare(strict_types=1);

namespace Eat518\Customer\Events\TicketHolds;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Concerns\SdkParams;
use Eat518\Core\Contracts\BaseModel;

/**
 * Release all active holds for the given session, freeing the tickets for others.
 *
 * @see Eat518\Services\Customer\Events\TicketHoldsService::release()
 *
 * @phpstan-type TicketHoldReleaseParamsShape = array{eventID: string}
 */
final class TicketHoldReleaseParams implements BaseModel
{
    /** @use SdkModel<TicketHoldReleaseParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $eventID;

    /**
     * `new TicketHoldReleaseParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TicketHoldReleaseParams::with(eventID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TicketHoldReleaseParams)->withEventID(...)
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
    public static function with(string $eventID): self
    {
        $self = new self;

        $self['eventID'] = $eventID;

        return $self;
    }

    public function withEventID(string $eventID): self
    {
        $self = clone $this;
        $self['eventID'] = $eventID;

        return $self;
    }
}
