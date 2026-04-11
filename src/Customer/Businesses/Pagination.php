<?php

declare(strict_types=1);

namespace Eat518\Customer\Businesses;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;

/**
 * @phpstan-type PaginationShape = array{
 *   currentPage: string, hasMore: string, perPage: string, total: string
 * }
 */
final class Pagination implements BaseModel
{
    /** @use SdkModel<PaginationShape> */
    use SdkModel;

    #[Required('current_page')]
    public string $currentPage;

    #[Required('has_more')]
    public string $hasMore;

    #[Required('per_page')]
    public string $perPage;

    #[Required]
    public string $total;

    /**
     * `new Pagination()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Pagination::with(currentPage: ..., hasMore: ..., perPage: ..., total: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Pagination)
     *   ->withCurrentPage(...)
     *   ->withHasMore(...)
     *   ->withPerPage(...)
     *   ->withTotal(...)
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
        string $currentPage,
        string $hasMore,
        string $perPage,
        string $total
    ): self {
        $self = new self;

        $self['currentPage'] = $currentPage;
        $self['hasMore'] = $hasMore;
        $self['perPage'] = $perPage;
        $self['total'] = $total;

        return $self;
    }

    public function withCurrentPage(string $currentPage): self
    {
        $self = clone $this;
        $self['currentPage'] = $currentPage;

        return $self;
    }

    public function withHasMore(string $hasMore): self
    {
        $self = clone $this;
        $self['hasMore'] = $hasMore;

        return $self;
    }

    public function withPerPage(string $perPage): self
    {
        $self = clone $this;
        $self['perPage'] = $perPage;

        return $self;
    }

    public function withTotal(string $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }
}
