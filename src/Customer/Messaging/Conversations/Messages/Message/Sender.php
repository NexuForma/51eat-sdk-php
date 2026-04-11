<?php

declare(strict_types=1);

namespace Eat518\Customer\Messaging\Conversations\Messages\Message;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;

/**
 * @phpstan-type SenderShape = array{id: string, email: string, name: string}
 */
final class Sender implements BaseModel
{
    /** @use SdkModel<SenderShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public string $email;

    #[Required]
    public string $name;

    /**
     * `new Sender()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Sender::with(id: ..., email: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Sender)->withID(...)->withEmail(...)->withName(...)
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
    public static function with(string $id, string $email, string $name): self
    {
        $self = new self;

        $self['id'] = $id;
        $self['email'] = $email;
        $self['name'] = $name;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
