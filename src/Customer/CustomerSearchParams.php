<?php

declare(strict_types=1);

namespace Eat518\Customer;

use Eat518\Core\Attributes\Optional;
use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Concerns\SdkParams;
use Eat518\Core\Contracts\BaseModel;

/**
 * Returns grouped results for each type. Use per_type to control how many results
 * appear per section. Optionally filter by category, city, or geo radius.
 *
 * @see Eat518\Services\CustomerService::search()
 *
 * @phpstan-type CustomerSearchParamsShape = array{
 *   q: string,
 *   category?: string|null,
 *   city?: string|null,
 *   lat?: mixed,
 *   lng?: mixed,
 *   perType?: int|null,
 *   radiusKm?: int|null,
 * }
 */
final class CustomerSearchParams implements BaseModel
{
    /** @use SdkModel<CustomerSearchParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Search query.
     */
    #[Required]
    public string $q;

    /**
     * Filter by business category.
     */
    #[Optional]
    public ?string $category;

    /**
     * Filter by city.
     */
    #[Optional]
    public ?string $city;

    /**
     * Latitude for geo radius filter (requires lng and radius_km).
     */
    #[Optional]
    public mixed $lat;

    /**
     * Longitude for geo radius filter (requires lat and radius_km).
     */
    #[Optional]
    public mixed $lng;

    /**
     * Max results per type (default 5, max 20).
     */
    #[Optional]
    public ?int $perType;

    /**
     * Geo radius in kilometers (requires lat and lng).
     */
    #[Optional]
    public ?int $radiusKm;

    /**
     * `new CustomerSearchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CustomerSearchParams::with(q: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CustomerSearchParams)->withQ(...)
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
        string $q,
        ?string $category = null,
        ?string $city = null,
        mixed $lat = null,
        mixed $lng = null,
        ?int $perType = null,
        ?int $radiusKm = null,
    ): self {
        $self = new self;

        $self['q'] = $q;

        null !== $category && $self['category'] = $category;
        null !== $city && $self['city'] = $city;
        null !== $lat && $self['lat'] = $lat;
        null !== $lng && $self['lng'] = $lng;
        null !== $perType && $self['perType'] = $perType;
        null !== $radiusKm && $self['radiusKm'] = $radiusKm;

        return $self;
    }

    /**
     * Search query.
     */
    public function withQ(string $q): self
    {
        $self = clone $this;
        $self['q'] = $q;

        return $self;
    }

    /**
     * Filter by business category.
     */
    public function withCategory(string $category): self
    {
        $self = clone $this;
        $self['category'] = $category;

        return $self;
    }

    /**
     * Filter by city.
     */
    public function withCity(string $city): self
    {
        $self = clone $this;
        $self['city'] = $city;

        return $self;
    }

    /**
     * Latitude for geo radius filter (requires lng and radius_km).
     */
    public function withLat(mixed $lat): self
    {
        $self = clone $this;
        $self['lat'] = $lat;

        return $self;
    }

    /**
     * Longitude for geo radius filter (requires lat and radius_km).
     */
    public function withLng(mixed $lng): self
    {
        $self = clone $this;
        $self['lng'] = $lng;

        return $self;
    }

    /**
     * Max results per type (default 5, max 20).
     */
    public function withPerType(int $perType): self
    {
        $self = clone $this;
        $self['perType'] = $perType;

        return $self;
    }

    /**
     * Geo radius in kilometers (requires lat and lng).
     */
    public function withRadiusKm(int $radiusKm): self
    {
        $self = clone $this;
        $self['radiusKm'] = $radiusKm;

        return $self;
    }
}
