<?php

declare(strict_types=1);

namespace Eat518\Customer\Businesses\Rsvp;

use Eat518\Core\Attributes\Optional;
use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Concerns\SdkParams;
use Eat518\Core\Contracts\BaseModel;

/**
 * Create or update the authenticated user's RSVP for a business event.
 *
 * @see Eat518\Services\Customer\Businesses\RsvpService::create()
 *
 * @phpstan-type RsvpCreateParamsShape = array{
 *   handle: string, status: string, notes?: string|null
 * }
 */
final class RsvpCreateParams implements BaseModel
{
    /** @use SdkModel<RsvpCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $handle;

    /**
     * RSVP status.
     */
    #[Required]
    public string $status;

    /**
     * Optional notes.
     */
    #[Optional]
    public ?string $notes;

    /**
     * `new RsvpCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RsvpCreateParams::with(handle: ..., status: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RsvpCreateParams)->withHandle(...)->withStatus(...)
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
    public static function with(
        string $handle,
        string $status,
        ?string $notes = null
    ): self {
        $self = new self;

        $self['handle'] = $handle;
        $self['status'] = $status;

        null !== $notes && $self['notes'] = $notes;

        return $self;
    }

    public function withHandle(string $handle): self
    {
        $self = clone $this;
        $self['handle'] = $handle;

        return $self;
    }

    /**
     * RSVP status.
     */
    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Optional notes.
     */
    public function withNotes(string $notes): self
    {
        $self = clone $this;
        $self['notes'] = $notes;

        return $self;
    }
}
