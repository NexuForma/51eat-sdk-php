<?php

declare(strict_types=1);

namespace Eat518\Customer\CustomerSearchResponse\Data;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;
use Eat518\Customer\CustomerSearchResponse\Data\Event\Business;

/**
 * @phpstan-import-type BusinessShape from \Eat518\Customer\CustomerSearchResponse\Data\Event\Business
 *
 * @phpstan-type EventShape = array{
 *   id: string,
 *   business: Business|BusinessShape,
 *   description: string|null,
 *   endsAt: string,
 *   image: string|null,
 *   location: string|null,
 *   startsAt: string,
 *   title: string,
 * }
 */
final class Event implements BaseModel
{
    /** @use SdkModel<EventShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public Business $business;

    #[Required]
    public ?string $description;

    #[Required('ends_at')]
    public string $endsAt;

    #[Required]
    public ?string $image;

    #[Required]
    public ?string $location;

    #[Required('starts_at')]
    public string $startsAt;

    #[Required]
    public string $title;

    /**
     * `new Event()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Event::with(
     *   id: ...,
     *   business: ...,
     *   description: ...,
     *   endsAt: ...,
     *   image: ...,
     *   location: ...,
     *   startsAt: ...,
     *   title: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Event)
     *   ->withID(...)
     *   ->withBusiness(...)
     *   ->withDescription(...)
     *   ->withEndsAt(...)
     *   ->withImage(...)
     *   ->withLocation(...)
     *   ->withStartsAt(...)
     *   ->withTitle(...)
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
     * @param Business|BusinessShape $business
     */
    public static function with(
        string $id,
        Business|array $business,
        ?string $description,
        string $endsAt,
        ?string $image,
        ?string $location,
        string $startsAt,
        string $title,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['business'] = $business;
        $self['description'] = $description;
        $self['endsAt'] = $endsAt;
        $self['image'] = $image;
        $self['location'] = $location;
        $self['startsAt'] = $startsAt;
        $self['title'] = $title;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param Business|BusinessShape $business
     */
    public function withBusiness(Business|array $business): self
    {
        $self = clone $this;
        $self['business'] = $business;

        return $self;
    }

    public function withDescription(?string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withEndsAt(string $endsAt): self
    {
        $self = clone $this;
        $self['endsAt'] = $endsAt;

        return $self;
    }

    public function withImage(?string $image): self
    {
        $self = clone $this;
        $self['image'] = $image;

        return $self;
    }

    public function withLocation(?string $location): self
    {
        $self = clone $this;
        $self['location'] = $location;

        return $self;
    }

    public function withStartsAt(string $startsAt): self
    {
        $self = clone $this;
        $self['startsAt'] = $startsAt;

        return $self;
    }

    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }
}
