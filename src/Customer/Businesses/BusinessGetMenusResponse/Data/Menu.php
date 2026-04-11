<?php

declare(strict_types=1);

namespace Eat518\Customer\Businesses\BusinessGetMenusResponse\Data;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;
use Eat518\Customer\Businesses\BusinessGetMenusResponse\Data\Menu\Group;

/**
 * @phpstan-import-type GroupShape from \Eat518\Customer\Businesses\BusinessGetMenusResponse\Data\Menu\Group
 *
 * @phpstan-type MenuShape = array{
 *   id: string,
 *   description: string|null,
 *   groups: list<Group|GroupShape>,
 *   name: string,
 * }
 */
final class Menu implements BaseModel
{
    /** @use SdkModel<MenuShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public ?string $description;

    /** @var list<Group> $groups */
    #[Required(list: Group::class)]
    public array $groups;

    #[Required]
    public string $name;

    /**
     * `new Menu()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Menu::with(id: ..., description: ..., groups: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Menu)->withID(...)->withDescription(...)->withGroups(...)->withName(...)
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
     * @param list<Group|GroupShape> $groups
     */
    public static function with(
        string $id,
        ?string $description,
        array $groups,
        string $name
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['description'] = $description;
        $self['groups'] = $groups;
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
     * @param list<Group|GroupShape> $groups
     */
    public function withGroups(array $groups): self
    {
        $self = clone $this;
        $self['groups'] = $groups;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
