<?php

declare(strict_types=1);

namespace Eat518\Customer\Discovery\Category;

use Eat518\Core\Attributes\Optional;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Concerns\SdkParams;
use Eat518\Core\Contracts\BaseModel;

/**
 * Retrieve businesses for a specific category with pagination support.
 * Results are optimized for list display.
 *
 * @see Eat518\Services\Customer\Discovery\CategoryService::getBusinesses()
 *
 * @phpstan-type CategoryGetBusinessesParamsShape = array{
 *   page?: int|null, perPage?: int|null, search?: string|null
 * }
 */
final class CategoryGetBusinessesParams implements BaseModel
{
    /** @use SdkModel<CategoryGetBusinessesParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Page number for pagination.
     */
    #[Optional]
    public ?int $page;

    /**
     * Number of businesses per page.
     */
    #[Optional]
    public ?int $perPage;

    /**
     * Search term for business name or description.
     */
    #[Optional]
    public ?string $search;

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
        ?int $page = null,
        ?int $perPage = null,
        ?string $search = null
    ): self {
        $self = new self;

        null !== $page && $self['page'] = $page;
        null !== $perPage && $self['perPage'] = $perPage;
        null !== $search && $self['search'] = $search;

        return $self;
    }

    /**
     * Page number for pagination.
     */
    public function withPage(int $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }

    /**
     * Number of businesses per page.
     */
    public function withPerPage(int $perPage): self
    {
        $self = clone $this;
        $self['perPage'] = $perPage;

        return $self;
    }

    /**
     * Search term for business name or description.
     */
    public function withSearch(string $search): self
    {
        $self = clone $this;
        $self['search'] = $search;

        return $self;
    }
}
