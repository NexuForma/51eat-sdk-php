<?php

declare(strict_types=1);

namespace Eat518\Customer;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;
use Eat518\Customer\CustomerLogoutResponse\Message;

/**
 * @phpstan-type CustomerLogoutResponseShape = array{
 *   message: Message|value-of<Message>
 * }
 */
final class CustomerLogoutResponse implements BaseModel
{
    /** @use SdkModel<CustomerLogoutResponseShape> */
    use SdkModel;

    /** @var value-of<Message> $message */
    #[Required(enum: Message::class)]
    public string $message;

    /**
     * `new CustomerLogoutResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CustomerLogoutResponse::with(message: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CustomerLogoutResponse)->withMessage(...)
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
     * @param Message|value-of<Message> $message
     */
    public static function with(Message|string $message): self
    {
        $self = new self;

        $self['message'] = $message;

        return $self;
    }

    /**
     * @param Message|value-of<Message> $message
     */
    public function withMessage(Message|string $message): self
    {
        $self = clone $this;
        $self['message'] = $message;

        return $self;
    }
}
