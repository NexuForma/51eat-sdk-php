<?php

declare(strict_types=1);

namespace Eat518\Customer\Businesses\Events;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Concerns\SdkParams;
use Eat518\Core\Contracts\BaseModel;

/**
 * Retrieve full details for a single upcoming event belonging to the business.
 *
 * @see Eat518\Services\Customer\Businesses\EventsService::retrieve()
 *
 * @phpstan-type EventRetrieveParamsShape = array{handle: string}
 */
final class EventRetrieveParams implements BaseModel
{
    /** @use SdkModel<EventRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $handle;

    /**
     * `new EventRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventRetrieveParams::with(handle: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EventRetrieveParams)->withHandle(...)
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
    public static function with(string $handle): self
    {
        $self = new self;

        $self['handle'] = $handle;

        return $self;
    }

    public function withHandle(string $handle): self
    {
        $self = clone $this;
        $self['handle'] = $handle;

        return $self;
    }
}
