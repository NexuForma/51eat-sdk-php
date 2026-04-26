<?php

declare(strict_types=1);

namespace Eat518\Customer\Businesses\Bulletins\Comments;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CommentShape from \Eat518\Customer\Businesses\Bulletins\Comments\Comment
 *
 * @phpstan-type CommentNewResponseShape = array{data: Comment|CommentShape}
 */
final class CommentNewResponse implements BaseModel
{
    /** @use SdkModel<CommentNewResponseShape> */
    use SdkModel;

    #[Required]
    public Comment $data;

    /**
     * `new CommentNewResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CommentNewResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CommentNewResponse)->withData(...)
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
     * @param Comment|CommentShape $data
     */
    public static function with(Comment|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Comment|CommentShape $data
     */
    public function withData(Comment|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
