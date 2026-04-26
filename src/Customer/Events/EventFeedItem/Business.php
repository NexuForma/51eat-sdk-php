<?php

declare(strict_types=1);

namespace Eat518\Customer\Events\EventFeedItem;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;

/**
 * @phpstan-type BusinessShape = array{
 *   handle: string, logo: string|null, name: string
 * }
 */
final class Business implements BaseModel
{
    /** @use SdkModel<BusinessShape> */
    use SdkModel;

    #[Required]
    public string $handle;

    #[Required]
    public ?string $logo;

    #[Required]
    public string $name;

    /**
     * `new Business()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Business::with(handle: ..., logo: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Business)->withHandle(...)->withLogo(...)->withName(...)
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
        ?string $logo,
        string $name
    ): self {
        $self = new self;

        $self['handle'] = $handle;
        $self['logo'] = $logo;
        $self['name'] = $name;

        return $self;
    }

    public function withHandle(string $handle): self
    {
        $self = clone $this;
        $self['handle'] = $handle;

        return $self;
    }

    public function withLogo(?string $logo): self
    {
        $self = clone $this;
        $self['logo'] = $logo;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
