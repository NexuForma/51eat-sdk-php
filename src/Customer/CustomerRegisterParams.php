<?php

declare(strict_types=1);

namespace Eat518\Customer;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Concerns\SdkParams;
use Eat518\Core\Contracts\BaseModel;

/**
 * Create a new customer account and return an API token for immediate authentication.
 *
 * @see Eat518\Services\CustomerService::register()
 *
 * @phpstan-type CustomerRegisterParamsShape = array{
 *   deviceName: string,
 *   email: string,
 *   name: string,
 *   password: string,
 *   passwordConfirmation: string,
 * }
 */
final class CustomerRegisterParams implements BaseModel
{
    /** @use SdkModel<CustomerRegisterParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A descriptive name for the device.
     */
    #[Required('device_name')]
    public string $deviceName;

    /**
     * The customer's email address.
     */
    #[Required]
    public string $email;

    /**
     * The customer's full name.
     */
    #[Required]
    public string $name;

    /**
     * The customer's password.
     */
    #[Required]
    public string $password;

    /**
     * Password confirmation.
     */
    #[Required('password_confirmation')]
    public string $passwordConfirmation;

    /**
     * `new CustomerRegisterParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CustomerRegisterParams::with(
     *   deviceName: ...,
     *   email: ...,
     *   name: ...,
     *   password: ...,
     *   passwordConfirmation: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CustomerRegisterParams)
     *   ->withDeviceName(...)
     *   ->withEmail(...)
     *   ->withName(...)
     *   ->withPassword(...)
     *   ->withPasswordConfirmation(...)
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
        string $deviceName,
        string $email,
        string $name,
        string $password,
        string $passwordConfirmation,
    ): self {
        $self = new self;

        $self['deviceName'] = $deviceName;
        $self['email'] = $email;
        $self['name'] = $name;
        $self['password'] = $password;
        $self['passwordConfirmation'] = $passwordConfirmation;

        return $self;
    }

    /**
     * A descriptive name for the device.
     */
    public function withDeviceName(string $deviceName): self
    {
        $self = clone $this;
        $self['deviceName'] = $deviceName;

        return $self;
    }

    /**
     * The customer's email address.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * The customer's full name.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The customer's password.
     */
    public function withPassword(string $password): self
    {
        $self = clone $this;
        $self['password'] = $password;

        return $self;
    }

    /**
     * Password confirmation.
     */
    public function withPasswordConfirmation(string $passwordConfirmation): self
    {
        $self = clone $this;
        $self['passwordConfirmation'] = $passwordConfirmation;

        return $self;
    }
}
