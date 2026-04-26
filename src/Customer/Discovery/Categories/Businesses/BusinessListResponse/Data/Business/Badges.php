<?php

declare(strict_types=1);

namespace Eat518\Customer\Discovery\Categories\Businesses\BusinessListResponse\Data\Business;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;

/**
 * @phpstan-type BadgesShape = array{foundingPartner: bool, staffPick: bool}
 */
final class Badges implements BaseModel
{
    /** @use SdkModel<BadgesShape> */
    use SdkModel;

    #[Required('founding_partner')]
    public bool $foundingPartner;

    #[Required('staff_pick')]
    public bool $staffPick;

    /**
     * `new Badges()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Badges::with(foundingPartner: ..., staffPick: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Badges)->withFoundingPartner(...)->withStaffPick(...)
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
    public static function with(bool $foundingPartner, bool $staffPick): self
    {
        $self = new self;

        $self['foundingPartner'] = $foundingPartner;
        $self['staffPick'] = $staffPick;

        return $self;
    }

    public function withFoundingPartner(bool $foundingPartner): self
    {
        $self = clone $this;
        $self['foundingPartner'] = $foundingPartner;

        return $self;
    }

    public function withStaffPick(bool $staffPick): self
    {
        $self = clone $this;
        $self['staffPick'] = $staffPick;

        return $self;
    }
}
