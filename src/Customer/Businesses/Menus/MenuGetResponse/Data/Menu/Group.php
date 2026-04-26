<?php

declare(strict_types=1);

namespace Eat518\Customer\Businesses\Menus\MenuGetResponse\Data\Menu;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;
use Eat518\Customer\Businesses\Menus\MenuGetResponse\Data\Menu\Group\Item;

/**
 * @phpstan-import-type ItemShape from \Eat518\Customer\Businesses\Menus\MenuGetResponse\Data\Menu\Group\Item
 *
 * @phpstan-type GroupShape = array{
 *   id: string,
 *   description: string|null,
 *   items: list<Item|ItemShape>,
 *   name: string,
 * }
 */
final class Group implements BaseModel
{
    /** @use SdkModel<GroupShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public ?string $description;

    /** @var list<Item> $items */
    #[Required(list: Item::class)]
    public array $items;

    #[Required]
    public string $name;

    /**
     * `new Group()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Group::with(id: ..., description: ..., items: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Group)->withID(...)->withDescription(...)->withItems(...)->withName(...)
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
     * @param list<Item|ItemShape> $items
     */
    public static function with(
        string $id,
        ?string $description,
        array $items,
        string $name
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['description'] = $description;
        $self['items'] = $items;
        $self['name'] = $name;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withDescription(?string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * @param list<Item|ItemShape> $items
     */
    public function withItems(array $items): self
    {
        $self = clone $this;
        $self['items'] = $items;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
