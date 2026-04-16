<?php

declare(strict_types=1);

namespace Eat518\Customer\Events\TicketHolds\TicketHoldNewResponse;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   expiresAt: string,
 *   holds: string,
 *   sessionID: string|null,
 *   timeRemainingSeconds: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required('expires_at')]
    public string $expiresAt;

    #[Required]
    public string $holds;

    #[Required('session_id')]
    public ?string $sessionID;

    #[Required('time_remaining_seconds')]
    public string $timeRemainingSeconds;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   expiresAt: ..., holds: ..., sessionID: ..., timeRemainingSeconds: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withExpiresAt(...)
     *   ->withHolds(...)
     *   ->withSessionID(...)
     *   ->withTimeRemainingSeconds(...)
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
        string $expiresAt,
        string $holds,
        ?string $sessionID,
        string $timeRemainingSeconds,
    ): self {
        $self = new self;

        $self['expiresAt'] = $expiresAt;
        $self['holds'] = $holds;
        $self['sessionID'] = $sessionID;
        $self['timeRemainingSeconds'] = $timeRemainingSeconds;

        return $self;
    }

    public function withExpiresAt(string $expiresAt): self
    {
        $self = clone $this;
        $self['expiresAt'] = $expiresAt;

        return $self;
    }

    public function withHolds(string $holds): self
    {
        $self = clone $this;
        $self['holds'] = $holds;

        return $self;
    }

    public function withSessionID(?string $sessionID): self
    {
        $self = clone $this;
        $self['sessionID'] = $sessionID;

        return $self;
    }

    public function withTimeRemainingSeconds(string $timeRemainingSeconds): self
    {
        $self = clone $this;
        $self['timeRemainingSeconds'] = $timeRemainingSeconds;

        return $self;
    }
}
