<?php

declare(strict_types=1);

namespace Eat518\Customer;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type LoginResponseShape from \Eat518\Customer\LoginResponse
 *
 * @phpstan-type CustomerLoginResponseShape = array{
 *   data: LoginResponse|LoginResponseShape
 * }
 */
final class CustomerLoginResponse implements BaseModel
{
    /** @use SdkModel<CustomerLoginResponseShape> */
    use SdkModel;

    #[Required]
    public LoginResponse $data;

    /**
     * `new CustomerLoginResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CustomerLoginResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CustomerLoginResponse)->withData(...)
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
     * @param LoginResponse|LoginResponseShape $data
     */
    public static function with(LoginResponse|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param LoginResponse|LoginResponseShape $data
     */
    public function withData(LoginResponse|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
