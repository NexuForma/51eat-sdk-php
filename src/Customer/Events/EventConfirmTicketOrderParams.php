<?php

declare(strict_types=1);

namespace Eat518\Customer\Events;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Concerns\SdkParams;
use Eat518\Core\Contracts\BaseModel;

/**
 * Confirm a completed Stripe payment and create the ticket order.
 * The payment must have succeeded before calling this endpoint.
 *
 * @see Eat518\Services\Customer\EventsService::confirmTicketOrder()
 *
 * @phpstan-type EventConfirmTicketOrderParamsShape = array{
 *   paymentIntentID: string, sessionID: string
 * }
 */
final class EventConfirmTicketOrderParams implements BaseModel
{
    /** @use SdkModel<EventConfirmTicketOrderParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required('payment_intent_id')]
    public string $paymentIntentID;

    #[Required('session_id')]
    public string $sessionID;

    /**
     * `new EventConfirmTicketOrderParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventConfirmTicketOrderParams::with(paymentIntentID: ..., sessionID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EventConfirmTicketOrderParams)
     *   ->withPaymentIntentID(...)
     *   ->withSessionID(...)
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
        string $paymentIntentID,
        string $sessionID
    ): self {
        $self = new self;

        $self['paymentIntentID'] = $paymentIntentID;
        $self['sessionID'] = $sessionID;

        return $self;
    }

    public function withPaymentIntentID(string $paymentIntentID): self
    {
        $self = clone $this;
        $self['paymentIntentID'] = $paymentIntentID;

        return $self;
    }

    public function withSessionID(string $sessionID): self
    {
        $self = clone $this;
        $self['sessionID'] = $sessionID;

        return $self;
    }
}
