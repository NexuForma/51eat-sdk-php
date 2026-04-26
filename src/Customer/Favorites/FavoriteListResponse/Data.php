<?php

declare(strict_types=1);

namespace Eat518\Customer\Favorites\FavoriteListResponse;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;
use Eat518\Customer\Businesses\BusinessProfile;
use Eat518\Customer\Businesses\Pagination;

/**
 * @phpstan-import-type BusinessProfileShape from \Eat518\Customer\Businesses\BusinessProfile
 * @phpstan-import-type PaginationShape from \Eat518\Customer\Businesses\Pagination
 *
 * @phpstan-type DataShape = array{
 *   businesses: list<BusinessProfile|BusinessProfileShape>,
 *   pagination: Pagination|PaginationShape,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /** @var list<BusinessProfile> $businesses */
    #[Required(list: BusinessProfile::class)]
    public array $businesses;

    #[Required]
    public Pagination $pagination;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(businesses: ..., pagination: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withBusinesses(...)->withPagination(...)
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
     * @param list<BusinessProfile|BusinessProfileShape> $businesses
     * @param Pagination|PaginationShape $pagination
     */
    public static function with(
        array $businesses,
        Pagination|array $pagination
    ): self {
        $self = new self;

        $self['businesses'] = $businesses;
        $self['pagination'] = $pagination;

        return $self;
    }

    /**
     * @param list<BusinessProfile|BusinessProfileShape> $businesses
     */
    public function withBusinesses(array $businesses): self
    {
        $self = clone $this;
        $self['businesses'] = $businesses;

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
