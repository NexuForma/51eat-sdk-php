<?php

declare(strict_types=1);

namespace Eat518\Customer\Businesses\Bulletins\Comments;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CommentShape from \Eat518\Customer\Businesses\Bulletins\Comments\Comment
 *
 * @phpstan-type CommentListResponseShape = array{data: list<Comment|CommentShape>}
 */
final class CommentListResponse implements BaseModel
{
    /** @use SdkModel<CommentListResponseShape> */
    use SdkModel;

    /** @var list<Comment> $data */
    #[Required(list: Comment::class)]
    public array $data;

    /**
     * `new CommentListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CommentListResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CommentListResponse)->withData(...)
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
     * @param list<Comment|CommentShape> $data
     */
    public static function with(array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<Comment|CommentShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
