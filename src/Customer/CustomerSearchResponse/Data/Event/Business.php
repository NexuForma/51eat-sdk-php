<?php

declare(strict_types=1);

namespace Eat518\Customer\CustomerSearchResponse\Data\Event;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;

/**
 * @phpstan-type BusinessShape = array{id: string, handle: string, name: string}
 */
final class Business implements BaseModel
{
    /** @use SdkModel<BusinessShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public string $handle;

    #[Required]
    public string $name;

    /**
     * `new Business()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Business::with(id: ..., handle: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Business)->withID(...)->withHandle(...)->withName(...)
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
    public static function with(string $id, string $handle, string $name): self
    {
        $self = new self;

        $self['id'] = $id;
        $self['handle'] = $handle;
        $self['name'] = $name;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withHandle(string $handle): self
    {
        $self = clone $this;
        $self['handle'] = $handle;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
