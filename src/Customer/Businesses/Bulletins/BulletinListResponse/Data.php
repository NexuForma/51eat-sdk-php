<?php

declare(strict_types=1);

namespace Eat518\Customer\Businesses\Bulletins\BulletinListResponse;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;
use Eat518\Customer\Businesses\Bulletins\BulletinListResponse\Data\Bulletin;
use Eat518\Customer\Businesses\Pagination;

/**
 * @phpstan-import-type BulletinShape from \Eat518\Customer\Businesses\Bulletins\BulletinListResponse\Data\Bulletin
 * @phpstan-import-type PaginationShape from \Eat518\Customer\Businesses\Pagination
 *
 * @phpstan-type DataShape = array{
 *   bulletins: list<Bulletin|BulletinShape>,
 *   pagination: Pagination|PaginationShape,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /** @var list<Bulletin> $bulletins */
    #[Required(list: Bulletin::class)]
    public array $bulletins;

    #[Required]
    public Pagination $pagination;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(bulletins: ..., pagination: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withBulletins(...)->withPagination(...)
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
     * @param list<Bulletin|BulletinShape> $bulletins
     * @param Pagination|PaginationShape $pagination
     */
    public static function with(
        array $bulletins,
        Pagination|array $pagination
    ): self {
        $self = new self;

        $self['bulletins'] = $bulletins;
        $self['pagination'] = $pagination;

        return $self;
    }

    /**
     * @param list<Bulletin|BulletinShape> $bulletins
     */
    public function withBulletins(array $bulletins): self
    {
        $self = clone $this;
        $self['bulletins'] = $bulletins;

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
