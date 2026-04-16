<?php

declare(strict_types=1);

namespace Eat518\Customer\Businesses\Photos\PhotoListResponse;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;
use Eat518\Customer\Businesses\Pagination;
use Eat518\Customer\Businesses\Photos\PhotoListResponse\Data\Photo;

/**
 * @phpstan-import-type PaginationShape from \Eat518\Customer\Businesses\Pagination
 * @phpstan-import-type PhotoShape from \Eat518\Customer\Businesses\Photos\PhotoListResponse\Data\Photo
 *
 * @phpstan-type DataShape = array{
 *   pagination: Pagination|PaginationShape, photos: list<Photo|PhotoShape>
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required]
    public Pagination $pagination;

    /** @var list<Photo> $photos */
    #[Required(list: Photo::class)]
    public array $photos;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(pagination: ..., photos: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withPagination(...)->withPhotos(...)
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
     * @param Pagination|PaginationShape $pagination
     * @param list<Photo|PhotoShape> $photos
     */
    public static function with(
        Pagination|array $pagination,
        array $photos
    ): self {
        $self = new self;

        $self['pagination'] = $pagination;
        $self['photos'] = $photos;

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

    /**
     * @param list<Photo|PhotoShape> $photos
     */
    public function withPhotos(array $photos): self
    {
        $self = clone $this;
        $self['photos'] = $photos;

        return $self;
    }
}
