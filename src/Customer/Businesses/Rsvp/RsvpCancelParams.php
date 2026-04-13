<?php

declare(strict_types=1);

namespace Eat518\Customer\Businesses\Rsvp;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Concerns\SdkParams;
use Eat518\Core\Contracts\BaseModel;

/**
 * Cancel the authenticated user's RSVP for a business event.
 *
 * @see Eat518\Services\Customer\Businesses\RsvpService::cancel()
 *
 * @phpstan-type RsvpCancelParamsShape = array{handle: string}
 */
final class RsvpCancelParams implements BaseModel
{
    /** @use SdkModel<RsvpCancelParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $handle;

    /**
     * `new RsvpCancelParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RsvpCancelParams::with(handle: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RsvpCancelParams)->withHandle(...)
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
