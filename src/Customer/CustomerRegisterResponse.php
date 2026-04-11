<?php

declare(strict_types=1);

namespace Eat518\Customer;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type LoginResponseShape from \Eat518\Customer\LoginResponse
 *
 * @phpstan-type CustomerRegisterResponseShape = array{
 *   data: LoginResponse|LoginResponseShape
 * }
 */
final class CustomerRegisterResponse implements BaseModel
{
    /** @use SdkModel<CustomerRegisterResponseShape> */
    use SdkModel;

    #[Required]
    public LoginResponse $data;

    /**
     * `new CustomerRegisterResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CustomerRegisterResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CustomerRegisterResponse)->withData(...)
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
