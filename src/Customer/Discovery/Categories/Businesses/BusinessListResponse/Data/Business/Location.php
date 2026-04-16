<?php

declare(strict_types=1);

namespace Eat518\Customer\Discovery\Categories\Businesses\BusinessListResponse\Data\Business;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;

/**
 * @phpstan-type LocationShape = array{city: string, state: string}
 */
final class Location implements BaseModel
{
    /** @use SdkModel<LocationShape> */
    use SdkModel;

    #[Required]
    public string $city;

    #[Required]
    public string $state;

    /**
     * `new Location()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Location::with(city: ..., state: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Location)->withCity(...)->withState(...)
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
    public static function with(string $city, string $state): self
    {
        $self = new self;

        $self['city'] = $city;
        $self['state'] = $state;

        return $self;
    }

    public function withCity(string $city): self
    {
        $self = clone $this;
        $self['city'] = $city;

        return $self;
    }

    public function withState(string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }
}
