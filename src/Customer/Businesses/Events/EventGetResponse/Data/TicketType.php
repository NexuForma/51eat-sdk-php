<?php

declare(strict_types=1);

namespace Eat518\Customer\Businesses\Events\EventGetResponse\Data;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;

/**
 * @phpstan-type TicketTypeShape = array{
 *   id: string,
 *   description: string|null,
 *   isAvailableForSale: bool,
 *   name: string,
 *   price: string,
 *   remainingQuantity: int|null,
 *   salesEndAt: \DateTimeInterface|null,
 *   salesStartAt: \DateTimeInterface|null,
 * }
 */
final class TicketType implements BaseModel
{
    /** @use SdkModel<TicketTypeShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public ?string $description;

    #[Required('is_available_for_sale')]
    public bool $isAvailableForSale;

    #[Required]
    public string $name;

    #[Required]
    public string $price;

    #[Required('remaining_quantity')]
    public ?int $remainingQuantity;

    #[Required('sales_end_at')]
    public ?\DateTimeInterface $salesEndAt;

    #[Required('sales_start_at')]
    public ?\DateTimeInterface $salesStartAt;

    /**
     * `new TicketType()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TicketType::with(
     *   id: ...,
     *   description: ...,
     *   isAvailableForSale: ...,
     *   name: ...,
     *   price: ...,
     *   remainingQuantity: ...,
     *   salesEndAt: ...,
     *   salesStartAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TicketType)
     *   ->withID(...)
     *   ->withDescription(...)
     *   ->withIsAvailableForSale(...)
     *   ->withName(...)
     *   ->withPrice(...)
     *   ->withRemainingQuantity(...)
     *   ->withSalesEndAt(...)
     *   ->withSalesStartAt(...)
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
        string $id,
        ?string $description,
        bool $isAvailableForSale,
        string $name,
        string $price,
        ?int $remainingQuantity,
        ?\DateTimeInterface $salesEndAt,
        ?\DateTimeInterface $salesStartAt,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['description'] = $description;
        $self['isAvailableForSale'] = $isAvailableForSale;
        $self['name'] = $name;
        $self['price'] = $price;
        $self['remainingQuantity'] = $remainingQuantity;
        $self['salesEndAt'] = $salesEndAt;
        $self['salesStartAt'] = $salesStartAt;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withDescription(?string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withIsAvailableForSale(bool $isAvailableForSale): self
    {
        $self = clone $this;
        $self['isAvailableForSale'] = $isAvailableForSale;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withPrice(string $price): self
    {
        $self = clone $this;
        $self['price'] = $price;

        return $self;
    }

    public function withRemainingQuantity(?int $remainingQuantity): self
    {
        $self = clone $this;
        $self['remainingQuantity'] = $remainingQuantity;

        return $self;
    }

    public function withSalesEndAt(?\DateTimeInterface $salesEndAt): self
    {
        $self = clone $this;
        $self['salesEndAt'] = $salesEndAt;

        return $self;
    }

    public function withSalesStartAt(?\DateTimeInterface $salesStartAt): self
    {
        $self = clone $this;
        $self['salesStartAt'] = $salesStartAt;

        return $self;
    }
}
