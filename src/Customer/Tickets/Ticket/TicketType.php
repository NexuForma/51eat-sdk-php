<?php

declare(strict_types=1);

namespace Eat518\Customer\Tickets\Ticket;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;

/**
 * @phpstan-type TicketTypeShape = array{id: string, name: string, price: string}
 */
final class TicketType implements BaseModel
{
    /** @use SdkModel<TicketTypeShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public string $name;

    #[Required]
    public string $price;

    /**
     * `new TicketType()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TicketType::with(id: ..., name: ..., price: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TicketType)->withID(...)->withName(...)->withPrice(...)
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
    public static function with(string $id, string $name, string $price): self
    {
        $self = new self;

        $self['id'] = $id;
        $self['name'] = $name;
        $self['price'] = $price;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

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
}
