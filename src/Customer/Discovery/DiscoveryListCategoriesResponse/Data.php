<?php

declare(strict_types=1);

namespace Eat518\Customer\Discovery\DiscoveryListCategoriesResponse;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   businessCount: int, label: string, value: string
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required('business_count')]
    public int $businessCount;

    #[Required]
    public string $label;

    #[Required]
    public string $value;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(businessCount: ..., label: ..., value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withBusinessCount(...)->withLabel(...)->withValue(...)
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
        int $businessCount,
        string $label,
        string $value
    ): self {
        $self = new self;

        $self['businessCount'] = $businessCount;
        $self['label'] = $label;
        $self['value'] = $value;

        return $self;
    }

    public function withBusinessCount(int $businessCount): self
    {
        $self = clone $this;
        $self['businessCount'] = $businessCount;

        return $self;
    }

    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
