<?php

declare(strict_types=1);

namespace Eat518\Customer\Discovery\Category\CategoryGetBusinessesResponse\Data\Business;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;

/**
 * @phpstan-type BadgesShape = array{foundingPartner: string, staffPick: string}
 */
final class Badges implements BaseModel
{
    /** @use SdkModel<BadgesShape> */
    use SdkModel;

    #[Required('founding_partner')]
    public string $foundingPartner;

    #[Required('staff_pick')]
    public string $staffPick;

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
    public static function with(
        string $foundingPartner,
        string $staffPick
    ): self {
        $self = new self;

        $self['foundingPartner'] = $foundingPartner;
        $self['staffPick'] = $staffPick;

        return $self;
    }

    public function withFoundingPartner(string $foundingPartner): self
    {
        $self = clone $this;
        $self['foundingPartner'] = $foundingPartner;

        return $self;
    }

    public function withStaffPick(string $staffPick): self
    {
        $self = clone $this;
        $self['staffPick'] = $staffPick;

        return $self;
    }
}
