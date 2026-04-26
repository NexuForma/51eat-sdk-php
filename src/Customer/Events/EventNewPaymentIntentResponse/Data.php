<?php

declare(strict_types=1);

namespace Eat518\Customer\Events\EventNewPaymentIntentResponse;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   clientSecret: string,
 *   paymentIntentID: string,
 *   platformFee: string,
 *   sessionID: string,
 *   subtotal: string,
 *   totalAmount: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required('client_secret')]
    public string $clientSecret;

    #[Required('payment_intent_id')]
    public string $paymentIntentID;

    #[Required('platform_fee')]
    public string $platformFee;

    #[Required('session_id')]
    public string $sessionID;

    #[Required]
    public string $subtotal;

    #[Required('total_amount')]
    public string $totalAmount;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   clientSecret: ...,
     *   paymentIntentID: ...,
     *   platformFee: ...,
     *   sessionID: ...,
     *   subtotal: ...,
     *   totalAmount: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withClientSecret(...)
     *   ->withPaymentIntentID(...)
     *   ->withPlatformFee(...)
     *   ->withSessionID(...)
     *   ->withSubtotal(...)
     *   ->withTotalAmount(...)
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
        string $clientSecret,
        string $paymentIntentID,
        string $platformFee,
        string $sessionID,
        string $subtotal,
        string $totalAmount,
    ): self {
        $self = new self;

        $self['clientSecret'] = $clientSecret;
        $self['paymentIntentID'] = $paymentIntentID;
        $self['platformFee'] = $platformFee;
        $self['sessionID'] = $sessionID;
        $self['subtotal'] = $subtotal;
        $self['totalAmount'] = $totalAmount;

        return $self;
    }

    public function withClientSecret(string $clientSecret): self
    {
        $self = clone $this;
        $self['clientSecret'] = $clientSecret;

        return $self;
    }

    public function withPaymentIntentID(string $paymentIntentID): self
    {
        $self = clone $this;
        $self['paymentIntentID'] = $paymentIntentID;

        return $self;
    }

    public function withPlatformFee(string $platformFee): self
    {
        $self = clone $this;
        $self['platformFee'] = $platformFee;

        return $self;
    }

    public function withSessionID(string $sessionID): self
    {
        $self = clone $this;
        $self['sessionID'] = $sessionID;

        return $self;
    }

    public function withSubtotal(string $subtotal): self
    {
        $self = clone $this;
        $self['subtotal'] = $subtotal;

        return $self;
    }

    public function withTotalAmount(string $totalAmount): self
    {
        $self = clone $this;
        $self['totalAmount'] = $totalAmount;

        return $self;
    }
}
