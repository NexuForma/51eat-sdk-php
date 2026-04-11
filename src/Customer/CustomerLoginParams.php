<?php

declare(strict_types=1);

namespace Eat518\Customer;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Concerns\SdkParams;
use Eat518\Core\Contracts\BaseModel;

/**
 * Exchange user credentials for an API token that can be used for subsequent authenticated requests.
 *
 * @see Eat518\Services\CustomerService::login()
 *
 * @phpstan-type CustomerLoginParamsShape = array{
 *   deviceName: string, email: string, password: string
 * }
 */
final class CustomerLoginParams implements BaseModel
{
    /** @use SdkModel<CustomerLoginParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A descriptive name for the device.
     */
    #[Required('device_name')]
    public string $deviceName;

    /**
     * The user's email address.
     */
    #[Required]
    public string $email;

    /**
     * The user's password.
     */
    #[Required]
    public string $password;

    /**
     * `new CustomerLoginParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CustomerLoginParams::with(deviceName: ..., email: ..., password: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CustomerLoginParams)
     *   ->withDeviceName(...)
     *   ->withEmail(...)
     *   ->withPassword(...)
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
        string $password
    ): self {
        $self = new self;

        $self['deviceName'] = $deviceName;
        $self['email'] = $email;
        $self['password'] = $password;

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
     * The user's email address.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * The user's password.
     */
    public function withPassword(string $password): self
    {
        $self = clone $this;
        $self['password'] = $password;

        return $self;
    }
}
