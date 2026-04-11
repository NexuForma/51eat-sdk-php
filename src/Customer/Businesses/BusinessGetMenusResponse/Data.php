<?php

declare(strict_types=1);

namespace Eat518\Customer\Businesses\BusinessGetMenusResponse;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;
use Eat518\Customer\Businesses\BusinessGetMenusResponse\Data\Menu;
use Eat518\Customer\Businesses\Pagination;

/**
 * @phpstan-import-type MenuShape from \Eat518\Customer\Businesses\BusinessGetMenusResponse\Data\Menu
 * @phpstan-import-type PaginationShape from \Eat518\Customer\Businesses\Pagination
 *
 * @phpstan-type DataShape = array{
 *   menus: list<Menu|MenuShape>, pagination: Pagination|PaginationShape
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /** @var list<Menu> $menus */
    #[Required(list: Menu::class)]
    public array $menus;

    #[Required]
    public Pagination $pagination;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(menus: ..., pagination: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withMenus(...)->withPagination(...)
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
     * @param list<Menu|MenuShape> $menus
     * @param Pagination|PaginationShape $pagination
     */
    public static function with(
        array $menus,
        Pagination|array $pagination
    ): self {
        $self = new self;

        $self['menus'] = $menus;
        $self['pagination'] = $pagination;

        return $self;
    }

    /**
     * @param list<Menu|MenuShape> $menus
     */
    public function withMenus(array $menus): self
    {
        $self = clone $this;
        $self['menus'] = $menus;

        return $self;
    }

    /**
     * @param Pagination|PaginationShape $pagination
     */
    public function withPagination(Pagination|array $pagination): self
    {
        $self = clone $this;
        $self['pagination'] = $pagination;

        return $self;
    }
}
