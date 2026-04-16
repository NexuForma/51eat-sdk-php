<?php

declare(strict_types=1);

namespace Eat518\Customer\Explore\Businesses\BusinessListResponse\Data;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;

/**
 * @phpstan-type BoundsShape = array{
 *   east: string, north: string, south: string, west: string
 * }
 */
final class Bounds implements BaseModel
{
    /** @use SdkModel<BoundsShape> */
    use SdkModel;

    #[Required]
    public string $east;

    #[Required]
    public string $north;

    #[Required]
    public string $south;

    #[Required]
    public string $west;

    /**
     * `new Bounds()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Bounds::with(east: ..., north: ..., south: ..., west: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Bounds)->withEast(...)->withNorth(...)->withSouth(...)->withWest(...)
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
        string $east,
        string $north,
        string $south,
        string $west
    ): self {
        $self = new self;

        $self['east'] = $east;
        $self['north'] = $north;
        $self['south'] = $south;
        $self['west'] = $west;

        return $self;
    }

    public function withEast(string $east): self
    {
        $self = clone $this;
        $self['east'] = $east;

        return $self;
    }

    public function withNorth(string $north): self
    {
        $self = clone $this;
        $self['north'] = $north;

        return $self;
    }

    public function withSouth(string $south): self
    {
        $self = clone $this;
        $self['south'] = $south;

        return $self;
    }

    public function withWest(string $west): self
    {
        $self = clone $this;
        $self['west'] = $west;

        return $self;
    }
}
