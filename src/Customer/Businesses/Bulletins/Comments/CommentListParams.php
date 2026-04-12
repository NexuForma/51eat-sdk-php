<?php

declare(strict_types=1);

namespace Eat518\Customer\Businesses\Bulletins\Comments;

use Eat518\Core\Attributes\Optional;
use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Concerns\SdkParams;
use Eat518\Core\Contracts\BaseModel;

/**
 * Retrieve paginated comments for a published business bulletin.
 *
 * @see Eat518\Services\Customer\Businesses\Bulletins\CommentsService::list()
 *
 * @phpstan-type CommentListParamsShape = array{
 *   handle: string, page?: int|null, perPage?: int|null
 * }
 */
final class CommentListParams implements BaseModel
{
    /** @use SdkModel<CommentListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $handle;

    /**
     * Page number for pagination.
     */
    #[Optional]
    public ?int $page;

    /**
     * Number of comments per page.
     */
    #[Optional]
    public ?int $perPage;

    /**
     * `new CommentListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CommentListParams::with(handle: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CommentListParams)->withHandle(...)
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
        string $handle,
        ?int $page = null,
        ?int $perPage = null
    ): self {
        $self = new self;

        $self['handle'] = $handle;

        null !== $page && $self['page'] = $page;
        null !== $perPage && $self['perPage'] = $perPage;

        return $self;
    }

    public function withHandle(string $handle): self
    {
        $self = clone $this;
        $self['handle'] = $handle;

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
     * Number of comments per page.
     */
    public function withPerPage(int $perPage): self
    {
        $self = clone $this;
        $self['perPage'] = $perPage;

        return $self;
    }
}
