<?php

declare(strict_types=1);

namespace Eat518\Customer;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type UserShape from \Eat518\Customer\User
 *
 * @phpstan-type CustomerGetUserResponseShape = array{data: User|UserShape}
 */
final class CustomerGetUserResponse implements BaseModel
{
    /** @use SdkModel<CustomerGetUserResponseShape> */
    use SdkModel;

    #[Required]
    public User $data;

    /**
     * `new CustomerGetUserResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CustomerGetUserResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CustomerGetUserResponse)->withData(...)
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
     * @param User|UserShape $data
     */
    public static function with(User|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param User|UserShape $data
     */
    public function withData(User|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
