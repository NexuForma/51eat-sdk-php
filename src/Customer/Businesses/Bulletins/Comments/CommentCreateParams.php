<?php

declare(strict_types=1);

namespace Eat518\Customer\Businesses\Bulletins\Comments;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Concerns\SdkParams;
use Eat518\Core\Contracts\BaseModel;

/**
 * Post a comment on a business bulletin. Requires authentication.
 *
 * @see Eat518\Services\Customer\Businesses\Bulletins\CommentsService::create()
 *
 * @phpstan-type CommentCreateParamsShape = array{handle: string, body: string}
 */
final class CommentCreateParams implements BaseModel
{
    /** @use SdkModel<CommentCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $handle;

    /**
     * The comment text.
     */
    #[Required]
    public string $body;

    /**
     * `new CommentCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CommentCreateParams::with(handle: ..., body: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CommentCreateParams)->withHandle(...)->withBody(...)
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
    public static function with(string $handle, string $body): self
    {
        $self = new self;

        $self['handle'] = $handle;
        $self['body'] = $body;

        return $self;
    }

    public function withHandle(string $handle): self
    {
        $self = clone $this;
        $self['handle'] = $handle;

        return $self;
    }

    /**
     * The comment text.
     */
    public function withBody(string $body): self
    {
        $self = clone $this;
        $self['body'] = $body;

        return $self;
    }
}
