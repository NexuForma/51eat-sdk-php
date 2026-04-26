<?php

declare(strict_types=1);

namespace Eat518\Customer\Businesses\Bulletins\Comments\CommentListResponse;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;
use Eat518\Customer\Businesses\Bulletins\Comments\Comment;
use Eat518\Customer\Businesses\Pagination;

/**
 * @phpstan-import-type CommentShape from \Eat518\Customer\Businesses\Bulletins\Comments\Comment
 * @phpstan-import-type PaginationShape from \Eat518\Customer\Businesses\Pagination
 *
 * @phpstan-type DataShape = array{
 *   comments: list<Comment|CommentShape>, pagination: Pagination|PaginationShape
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /** @var list<Comment> $comments */
    #[Required(list: Comment::class)]
    public array $comments;

    #[Required]
    public Pagination $pagination;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(comments: ..., pagination: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withComments(...)->withPagination(...)
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
     * @param list<Comment|CommentShape> $comments
     * @param Pagination|PaginationShape $pagination
     */
    public static function with(
        array $comments,
        Pagination|array $pagination
    ): self {
        $self = new self;

        $self['comments'] = $comments;
        $self['pagination'] = $pagination;

        return $self;
    }

    /**
     * @param list<Comment|CommentShape> $comments
     */
    public function withComments(array $comments): self
    {
        $self = clone $this;
        $self['comments'] = $comments;

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
