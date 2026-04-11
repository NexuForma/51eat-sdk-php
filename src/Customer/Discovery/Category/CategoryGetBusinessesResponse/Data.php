<?php

declare(strict_types=1);

namespace Eat518\Customer\Discovery\Category\CategoryGetBusinessesResponse;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;
use Eat518\Customer\Businesses\Pagination;
use Eat518\Customer\Discovery\Category\CategoryGetBusinessesResponse\Data\Business;
use Eat518\Customer\Discovery\Category\CategoryGetBusinessesResponse\Data\Filters;

/**
 * @phpstan-import-type BusinessShape from \Eat518\Customer\Discovery\Category\CategoryGetBusinessesResponse\Data\Business
 * @phpstan-import-type FiltersShape from \Eat518\Customer\Discovery\Category\CategoryGetBusinessesResponse\Data\Filters
 * @phpstan-import-type PaginationShape from \Eat518\Customer\Businesses\Pagination
 *
 * @phpstan-type DataShape = array{
 *   businesses: list<Business|BusinessShape>,
 *   category: string,
 *   filters: Filters|FiltersShape,
 *   pagination: Pagination|PaginationShape,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /** @var list<Business> $businesses */
    #[Required(list: Business::class)]
    public array $businesses;

    #[Required]
    public string $category;

    #[Required]
    public Filters $filters;

    #[Required]
    public Pagination $pagination;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(businesses: ..., category: ..., filters: ..., pagination: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withBusinesses(...)
     *   ->withCategory(...)
     *   ->withFilters(...)
     *   ->withPagination(...)
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
     * @param list<Business|BusinessShape> $businesses
     * @param Filters|FiltersShape $filters
     * @param Pagination|PaginationShape $pagination
     */
    public static function with(
        array $businesses,
        string $category,
        Filters|array $filters,
        Pagination|array $pagination,
    ): self {
        $self = new self;

        $self['businesses'] = $businesses;
        $self['category'] = $category;
        $self['filters'] = $filters;
        $self['pagination'] = $pagination;

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

    public function withCategory(string $category): self
    {
        $self = clone $this;
        $self['category'] = $category;

        return $self;
    }

    /**
     * @param Filters|FiltersShape $filters
     */
    public function withFilters(Filters|array $filters): self
    {
        $self = clone $this;
        $self['filters'] = $filters;

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
