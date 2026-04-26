<?php

declare(strict_types=1);

namespace Eat518\Customer\Businesses\Bulletins\Comments;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;
use Eat518\Customer\Businesses\Bulletins\Comments\Comment\User;

/**
 * @phpstan-import-type UserShape from \Eat518\Customer\Businesses\Bulletins\Comments\Comment\User
 *
 * @phpstan-type CommentShape = array{
 *   id: string,
 *   body: string,
 *   createdAt: \DateTimeInterface|null,
 *   user: User|UserShape,
 * }
 */
final class Comment implements BaseModel
{
    /** @use SdkModel<CommentShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public string $body;

    #[Required('created_at')]
    public ?\DateTimeInterface $createdAt;

    #[Required]
    public User $user;

    /**
     * `new Comment()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Comment::with(id: ..., body: ..., createdAt: ..., user: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Comment)->withID(...)->withBody(...)->withCreatedAt(...)->withUser(...)
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
     * @param User|UserShape $user
     */
    public static function with(
        string $id,
        string $body,
        ?\DateTimeInterface $createdAt,
        User|array $user
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['body'] = $body;
        $self['createdAt'] = $createdAt;
        $self['user'] = $user;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withBody(string $body): self
    {
        $self = clone $this;
        $self['body'] = $body;

        return $self;
    }

    public function withCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * @param User|UserShape $user
     */
    public function withUser(User|array $user): self
    {
        $self = clone $this;
        $self['user'] = $user;

        return $self;
    }
}
