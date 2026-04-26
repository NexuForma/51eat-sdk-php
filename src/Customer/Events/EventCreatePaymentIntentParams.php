<?php

declare(strict_types=1);

namespace Eat518\Customer\Events;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Concerns\SdkParams;
use Eat518\Core\Contracts\BaseModel;

/**
 * Create a Stripe payment intent for the tickets held in the given session.
 * Returns a client_secret for the mobile app to confirm payment with Stripe.
 *
 * @see Eat518\Services\Customer\EventsService::createPaymentIntent()
 *
 * @phpstan-type EventCreatePaymentIntentParamsShape = array{sessionID: string}
 */
final class EventCreatePaymentIntentParams implements BaseModel
{
    /** @use SdkModel<EventCreatePaymentIntentParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required('session_id')]
    public string $sessionID;

    /**
     * `new EventCreatePaymentIntentParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventCreatePaymentIntentParams::with(sessionID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EventCreatePaymentIntentParams)->withSessionID(...)
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
    public static function with(string $sessionID): self
    {
        $self = new self;

        $self['sessionID'] = $sessionID;

        return $self;
    }

    public function withSessionID(string $sessionID): self
    {
        $self = clone $this;
        $self['sessionID'] = $sessionID;

        return $self;
    }
}
