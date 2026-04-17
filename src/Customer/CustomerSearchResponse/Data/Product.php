<?php

declare(strict_types=1);

namespace Eat518\Customer\CustomerSearchResponse\Data;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;
use Eat518\Customer\CustomerSearchResponse\Data\Product\Business;

/**
 * @phpstan-import-type BusinessShape from \Eat518\Customer\CustomerSearchResponse\Data\Product\Business
 *
 * @phpstan-type ProductShape = array{
 *   id: string,
 *   basePrice: float|null,
 *   business: Business|BusinessShape,
 *   description: string|null,
 *   name: string,
 * }
 */
final class Product implements BaseModel
{
    /** @use SdkModel<ProductShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required('base_price')]
    public ?float $basePrice;

    #[Required]
    public Business $business;

    #[Required]
    public ?string $description;

    #[Required]
    public string $name;

    /**
     * `new Product()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Product::with(
     *   id: ..., basePrice: ..., business: ..., description: ..., name: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Product)
     *   ->withID(...)
     *   ->withBasePrice(...)
     *   ->withBusiness(...)
     *   ->withDescription(...)
     *   ->withName(...)
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
     * @param Business|BusinessShape $business
     */
    public static function with(
        string $id,
        ?float $basePrice,
        Business|array $business,
        ?string $description,
        string $name,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['basePrice'] = $basePrice;
        $self['business'] = $business;
        $self['description'] = $description;
        $self['name'] = $name;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withBasePrice(?float $basePrice): self
    {
        $self = clone $this;
        $self['basePrice'] = $basePrice;

        return $self;
    }

    /**
     * @param Business|BusinessShape $business
     */
    public function withBusiness(Business|array $business): self
    {
        $self = clone $this;
        $self['business'] = $business;

        return $self;
    }

    public function withDescription(?string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
