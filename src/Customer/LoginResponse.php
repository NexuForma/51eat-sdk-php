<?php

declare(strict_types=1);

namespace Eat518\Customer;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type UserShape from \Eat518\Customer\User
 *
 * @phpstan-type LoginResponseShape = array{token: string, user: User|UserShape}
 */
final class LoginResponse implements BaseModel
{
    /** @use SdkModel<LoginResponseShape> */
    use SdkModel;

    #[Required]
    public string $token;

    #[Required]
    public User $user;

    /**
     * `new LoginResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LoginResponse::with(token: ..., user: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LoginResponse)->withToken(...)->withUser(...)
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
    public static function with(string $token, User|array $user): self
    {
        $self = new self;

        $self['token'] = $token;
        $self['user'] = $user;

        return $self;
    }

    public function withToken(string $token): self
    {
        $self = clone $this;
        $self['token'] = $token;

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
