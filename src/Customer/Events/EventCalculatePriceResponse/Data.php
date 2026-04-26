<?php

declare(strict_types=1);

namespace Eat518\Customer\Events\EventCalculatePriceResponse;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   lineItems: string, platformFee: string, subtotal: string, total: string
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required('line_items')]
    public string $lineItems;

    #[Required('platform_fee')]
    public string $platformFee;

    #[Required]
    public string $subtotal;

    #[Required]
    public string $total;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(lineItems: ..., platformFee: ..., subtotal: ..., total: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withLineItems(...)
     *   ->withPlatformFee(...)
     *   ->withSubtotal(...)
     *   ->withTotal(...)
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
        string $lineItems,
        string $platformFee,
        string $subtotal,
        string $total
    ): self {
        $self = new self;

        $self['lineItems'] = $lineItems;
        $self['platformFee'] = $platformFee;
        $self['subtotal'] = $subtotal;
        $self['total'] = $total;

        return $self;
    }

    public function withLineItems(string $lineItems): self
    {
        $self = clone $this;
        $self['lineItems'] = $lineItems;

        return $self;
    }

    public function withPlatformFee(string $platformFee): self
    {
        $self = clone $this;
        $self['platformFee'] = $platformFee;

        return $self;
    }

    public function withSubtotal(string $subtotal): self
    {
        $self = clone $this;
        $self['subtotal'] = $subtotal;

        return $self;
    }

    public function withTotal(string $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }
}
