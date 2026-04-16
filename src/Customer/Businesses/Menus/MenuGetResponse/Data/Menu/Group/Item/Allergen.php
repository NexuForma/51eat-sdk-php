<?php

declare(strict_types=1);

namespace Eat518\Customer\Businesses\Menus\MenuGetResponse\Data\Menu\Group\Item;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;

/**
 * @phpstan-type AllergenShape = array{
 *   id: string,
 *   color: string,
 *   createdAt: \DateTimeInterface|null,
 *   description: string|null,
 *   icon: string|null,
 *   name: string,
 *   slug: string,
 *   updatedAt: \DateTimeInterface|null,
 * }
 */
final class Allergen implements BaseModel
{
    /** @use SdkModel<AllergenShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public string $color;

    #[Required('created_at')]
    public ?\DateTimeInterface $createdAt;

    #[Required]
    public ?string $description;

    #[Required]
    public ?string $icon;

    #[Required]
    public string $name;

    #[Required]
    public string $slug;

    #[Required('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    /**
     * `new Allergen()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Allergen::with(
     *   id: ...,
     *   color: ...,
     *   createdAt: ...,
     *   description: ...,
     *   icon: ...,
     *   name: ...,
     *   slug: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Allergen)
     *   ->withID(...)
     *   ->withColor(...)
     *   ->withCreatedAt(...)
     *   ->withDescription(...)
     *   ->withIcon(...)
     *   ->withName(...)
     *   ->withSlug(...)
     *   ->withUpdatedAt(...)
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
        string $id,
        string $color,
        ?\DateTimeInterface $createdAt,
        ?string $description,
        ?string $icon,
        string $name,
        string $slug,
        ?\DateTimeInterface $updatedAt,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['color'] = $color;
        $self['createdAt'] = $createdAt;
        $self['description'] = $description;
        $self['icon'] = $icon;
        $self['name'] = $name;
        $self['slug'] = $slug;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withColor(string $color): self
    {
        $self = clone $this;
        $self['color'] = $color;

        return $self;
    }

    public function withCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withDescription(?string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withIcon(?string $icon): self
    {
        $self = clone $this;
        $self['icon'] = $icon;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withSlug(string $slug): self
    {
        $self = clone $this;
        $self['slug'] = $slug;

        return $self;
    }

    public function withUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
