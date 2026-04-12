<?php

declare(strict_types=1);

namespace Eat518\Customer\Businesses\BusinessGetMenusResponse\Data\Menu\Group;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;
use Eat518\Customer\Businesses\BusinessGetMenusResponse\Data\Menu\Group\Item\Allergen;
use Eat518\Customer\Businesses\BusinessGetMenusResponse\Data\Menu\Group\Item\Image;

/**
 * @phpstan-import-type AllergenShape from \Eat518\Customer\Businesses\BusinessGetMenusResponse\Data\Menu\Group\Item\Allergen
 * @phpstan-import-type ImageShape from \Eat518\Customer\Businesses\BusinessGetMenusResponse\Data\Menu\Group\Item\Image
 *
 * @phpstan-type ItemShape = array{
 *   id: string,
 *   allergens: list<Allergen|AllergenShape>,
 *   description: string|null,
 *   image: Image|ImageShape,
 *   name: string,
 *   price: float|null,
 * }
 */
final class Item implements BaseModel
{
    /** @use SdkModel<ItemShape> */
    use SdkModel;

    #[Required]
    public string $id;

    /** @var list<Allergen> $allergens */
    #[Required(list: Allergen::class)]
    public array $allergens;

    #[Required]
    public ?string $description;

    #[Required]
    public Image $image;

    #[Required]
    public string $name;

    #[Required]
    public ?float $price;

    /**
     * `new Item()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Item::with(
     *   id: ..., allergens: ..., description: ..., image: ..., name: ..., price: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Item)
     *   ->withID(...)
     *   ->withAllergens(...)
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
     * @param list<Allergen|AllergenShape> $allergens
     * @param Image|ImageShape $image
     */
    public static function with(
        string $id,
        array $allergens,
        ?string $description,
        Image|array $image,
        string $name,
        ?float $price,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['allergens'] = $allergens;
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
     * @param list<Allergen|AllergenShape> $allergens
     */
    public function withAllergens(array $allergens): self
    {
        $self = clone $this;
        $self['allergens'] = $allergens;

        return $self;
    }

    public function withDescription(?string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * @param Image|ImageShape $image
     */
    public function withImage(Image|array $image): self
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

    public function withPrice(?float $price): self
    {
        $self = clone $this;
        $self['price'] = $price;

        return $self;
    }
}
