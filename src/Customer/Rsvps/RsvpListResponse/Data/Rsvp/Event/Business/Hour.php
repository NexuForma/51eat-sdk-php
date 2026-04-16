<?php

declare(strict_types=1);

namespace Eat518\Customer\Rsvps\RsvpListResponse\Data\Rsvp\Event\Business;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;

/**
 * @phpstan-type HourShape = array{
 *   closeTime: string, isOpen: bool, openTime: string
 * }
 */
final class Hour implements BaseModel
{
    /** @use SdkModel<HourShape> */
    use SdkModel;

    #[Required]
    public string $closeTime;

    #[Required]
    public bool $isOpen;

    #[Required]
    public string $openTime;

    /**
     * `new Hour()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Hour::with(closeTime: ..., isOpen: ..., openTime: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Hour)->withCloseTime(...)->withIsOpen(...)->withOpenTime(...)
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
        string $closeTime,
        bool $isOpen,
        string $openTime
    ): self {
        $self = new self;

        $self['closeTime'] = $closeTime;
        $self['isOpen'] = $isOpen;
        $self['openTime'] = $openTime;

        return $self;
    }

    public function withCloseTime(string $closeTime): self
    {
        $self = clone $this;
        $self['closeTime'] = $closeTime;

        return $self;
    }

    public function withIsOpen(bool $isOpen): self
    {
        $self = clone $this;
        $self['isOpen'] = $isOpen;

        return $self;
    }

    public function withOpenTime(string $openTime): self
    {
        $self = clone $this;
        $self['openTime'] = $openTime;

        return $self;
    }
}
