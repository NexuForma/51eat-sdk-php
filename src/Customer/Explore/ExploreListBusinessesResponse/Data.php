<?php

declare(strict_types=1);

namespace Eat518\Customer\Explore\ExploreListBusinessesResponse;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;
use Eat518\Customer\Explore\ExploreListBusinessesResponse\Data\Bounds;
use Eat518\Customer\Explore\ExploreListBusinessesResponse\Data\Business;

/**
 * @phpstan-import-type BoundsShape from \Eat518\Customer\Explore\ExploreListBusinessesResponse\Data\Bounds
 * @phpstan-import-type BusinessShape from \Eat518\Customer\Explore\ExploreListBusinessesResponse\Data\Business
 *
 * @phpstan-type DataShape = array{
 *   bounds: Bounds|BoundsShape, businesses: list<Business|BusinessShape>
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required]
    public Bounds $bounds;

    /** @var list<Business> $businesses */
    #[Required(list: Business::class)]
    public array $businesses;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(bounds: ..., businesses: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withBounds(...)->withBusinesses(...)
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
     *
     * @param Bounds|BoundsShape $bounds
     * @param list<Business|BusinessShape> $businesses
     */
    public static function with(Bounds|array $bounds, array $businesses): self
    {
        $self = new self;

        $self['bounds'] = $bounds;
        $self['businesses'] = $businesses;

        return $self;
    }

    /**
     * @param Bounds|BoundsShape $bounds
     */
    public function withBounds(Bounds|array $bounds): self
    {
        $self = clone $this;
        $self['bounds'] = $bounds;

        return $self;
    }

    /**
     * @param list<Business|BusinessShape> $businesses
     */
    public function withBusinesses(array $businesses): self
    {
        $self = clone $this;
        $self['businesses'] = $businesses;

        return $self;
    }
}
