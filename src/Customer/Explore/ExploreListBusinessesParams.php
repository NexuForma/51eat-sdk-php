<?php

declare(strict_types=1);

namespace Eat518\Customer\Explore;

use Eat518\Core\Attributes\Optional;
use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Concerns\SdkParams;
use Eat518\Core\Contracts\BaseModel;

/**
 * Retrieve businesses within the specified map bounds for map view.
 * Results are optimized for map display with essential business information.
 *
 * @see Eat518\Services\Customer\ExploreService::listBusinesses()
 *
 * @phpstan-type ExploreListBusinessesParamsShape = array{
 *   bounds: string, zoomLevel?: int|null
 * }
 */
final class ExploreListBusinessesParams implements BaseModel
{
    /** @use SdkModel<ExploreListBusinessesParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Map bounds in format "north,south,east,west".
     */
    #[Required]
    public string $bounds;

    /**
     * Map zoom level for optimization.
     */
    #[Optional]
    public ?int $zoomLevel;

    /**
     * `new ExploreListBusinessesParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExploreListBusinessesParams::with(bounds: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExploreListBusinessesParams)->withBounds(...)
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
    public static function with(string $bounds, ?int $zoomLevel = null): self
    {
        $self = new self;

        $self['bounds'] = $bounds;

        null !== $zoomLevel && $self['zoomLevel'] = $zoomLevel;

        return $self;
    }

    /**
     * Map bounds in format "north,south,east,west".
     */
    public function withBounds(string $bounds): self
    {
        $self = clone $this;
        $self['bounds'] = $bounds;

        return $self;
    }

    /**
     * Map zoom level for optimization.
     */
    public function withZoomLevel(int $zoomLevel): self
    {
        $self = clone $this;
        $self['zoomLevel'] = $zoomLevel;

        return $self;
    }
}
