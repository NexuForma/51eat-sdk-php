<?php

declare(strict_types=1);

namespace Eat518\Customer\CustomerSearchResponse;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;
use Eat518\Customer\CustomerSearchResponse\Data\Business1 as Business;
use Eat518\Customer\CustomerSearchResponse\Data\Event;
use Eat518\Customer\CustomerSearchResponse\Data\MenuItem;
use Eat518\Customer\CustomerSearchResponse\Data\Product;

/**
 * @phpstan-import-type Business1Shape from \Eat518\Customer\CustomerSearchResponse\Data\Business1
 * @phpstan-import-type EventShape from \Eat518\Customer\CustomerSearchResponse\Data\Event
 * @phpstan-import-type MenuItemShape from \Eat518\Customer\CustomerSearchResponse\Data\MenuItem
 * @phpstan-import-type ProductShape from \Eat518\Customer\CustomerSearchResponse\Data\Product
 *
 * @phpstan-type DataShape = array{
 *   businesses: list<Business|Business1Shape>,
 *   events: list<Event|EventShape>,
 *   menuItems: list<MenuItem|MenuItemShape>,
 *   products: list<Product|ProductShape>,
 *   query: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /** @var list<Business> $businesses */
    #[Required(list: Business::class)]
    public array $businesses;

    /** @var list<Event> $events */
    #[Required(list: Event::class)]
    public array $events;

    /** @var list<MenuItem> $menuItems */
    #[Required('menu_items', list: MenuItem::class)]
    public array $menuItems;

    /** @var list<Product> $products */
    #[Required(list: Product::class)]
    public array $products;

    #[Required]
    public string $query;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   businesses: ..., events: ..., menuItems: ..., products: ..., query: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withBusinesses(...)
     *   ->withEvents(...)
     *   ->withMenuItems(...)
     *   ->withProducts(...)
     *   ->withQuery(...)
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
     * @param list<Business|Business1Shape> $businesses
     * @param list<Event|EventShape> $events
     * @param list<MenuItem|MenuItemShape> $menuItems
     * @param list<Product|ProductShape> $products
     */
    public static function with(
        array $businesses,
        array $events,
        array $menuItems,
        array $products,
        string $query,
    ): self {
        $self = new self;

        $self['businesses'] = $businesses;
        $self['events'] = $events;
        $self['menuItems'] = $menuItems;
        $self['products'] = $products;
        $self['query'] = $query;

        return $self;
    }

    /**
     * @param list<Business|Business1Shape> $businesses
     */
    public function withBusinesses(array $businesses): self
    {
        $self = clone $this;
        $self['businesses'] = $businesses;

        return $self;
    }

    /**
     * @param list<Event|EventShape> $events
     */
    public function withEvents(array $events): self
    {
        $self = clone $this;
        $self['events'] = $events;

        return $self;
    }

    /**
     * @param list<MenuItem|MenuItemShape> $menuItems
     */
    public function withMenuItems(array $menuItems): self
    {
        $self = clone $this;
        $self['menuItems'] = $menuItems;

        return $self;
    }

    /**
     * @param list<Product|ProductShape> $products
     */
    public function withProducts(array $products): self
    {
        $self = clone $this;
        $self['products'] = $products;

        return $self;
    }

    public function withQuery(string $query): self
    {
        $self = clone $this;
        $self['query'] = $query;

        return $self;
    }
}
