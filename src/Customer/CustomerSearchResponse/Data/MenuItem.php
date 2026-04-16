<?php

declare(strict_types=1);

namespace Eat518\Customer\CustomerSearchResponse\Data;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;
use Eat518\Customer\CustomerSearchResponse\Data\MenuItem\Business;

/**
 * @phpstan-import-type BusinessShape from \Eat518\Customer\CustomerSearchResponse\Data\MenuItem\Business
 *
 * @phpstan-type MenuItemShape = array{
 *   id: string,
 *   business: Business|BusinessShape,
 *   description: string,
 *   image: string,
 *   name: string,
 *   price: string,
 * }
 */
final class MenuItem implements BaseModel
{
    /** @use SdkModel<MenuItemShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public Business $business;

    #[Required]
    public string $description;

    #[Required]
    public string $image;

    #[Required]
    public string $name;

    #[Required]
    public string $price;

    /**
     * `new MenuItem()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MenuItem::with(
     *   id: ..., business: ..., description: ..., image: ..., name: ..., price: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MenuItem)
     *   ->withID(...)
     *   ->withBusiness(...)
     *   ->withDescription(...)
     *   ->withImage(...)
     *   ->withName(...)
     *   ->withPrice(...)
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
        Business|array $business,
        string $description,
        string $image,
        string $name,
        string $price,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['business'] = $business;
        $self['description'] = $description;
        $self['image'] = $image;
        $self['name'] = $name;
        $self['price'] = $price;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

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

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withImage(string $image): self
    {
        $self = clone $this;
        $self['image'] = $image;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withPrice(string $price): self
    {
        $self = clone $this;
        $self['price'] = $price;

        return $self;
    }
}
