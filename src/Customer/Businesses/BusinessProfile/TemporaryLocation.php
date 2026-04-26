<?php

declare(strict_types=1);

namespace Eat518\Customer\Businesses\BusinessProfile;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;

/**
 * @phpstan-type TemporaryLocationShape = array{
 *   id: string,
 *   address: string|null,
 *   city: string|null,
 *   country: string|null,
 *   endsAt: \DateTimeInterface,
 *   hours: array<string,mixed>,
 *   latitude: float|null,
 *   longitude: float|null,
 *   notes: string|null,
 *   startsAt: \DateTimeInterface,
 *   state: string|null,
 *   title: string,
 *   zip: string|null,
 * }
 */
final class TemporaryLocation implements BaseModel
{
    /** @use SdkModel<TemporaryLocationShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public ?string $address;

    #[Required]
    public ?string $city;

    #[Required]
    public ?string $country;

    #[Required('ends_at')]
    public \DateTimeInterface $endsAt;

    /** @var array<string,mixed> $hours */
    #[Required(map: 'mixed')]
    public array $hours;

    #[Required]
    public ?float $latitude;

    #[Required]
    public ?float $longitude;

    #[Required]
    public ?string $notes;

    #[Required('starts_at')]
    public \DateTimeInterface $startsAt;

    #[Required]
    public ?string $state;

    #[Required]
    public string $title;

    #[Required]
    public ?string $zip;

    /**
     * `new TemporaryLocation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TemporaryLocation::with(
     *   id: ...,
     *   address: ...,
     *   city: ...,
     *   country: ...,
     *   endsAt: ...,
     *   hours: ...,
     *   latitude: ...,
     *   longitude: ...,
     *   notes: ...,
     *   startsAt: ...,
     *   state: ...,
     *   title: ...,
     *   zip: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TemporaryLocation)
     *   ->withID(...)
     *   ->withAddress(...)
     *   ->withCity(...)
     *   ->withCountry(...)
     *   ->withEndsAt(...)
     *   ->withHours(...)
     *   ->withLatitude(...)
     *   ->withLongitude(...)
     *   ->withNotes(...)
     *   ->withStartsAt(...)
     *   ->withState(...)
     *   ->withTitle(...)
     *   ->withZip(...)
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
     * @param array<string,mixed> $hours
     */
    public static function with(
        string $id,
        ?string $address,
        ?string $city,
        ?string $country,
        \DateTimeInterface $endsAt,
        array $hours,
        ?float $latitude,
        ?float $longitude,
        ?string $notes,
        \DateTimeInterface $startsAt,
        ?string $state,
        string $title,
        ?string $zip,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['address'] = $address;
        $self['city'] = $city;
        $self['country'] = $country;
        $self['endsAt'] = $endsAt;
        $self['hours'] = $hours;
        $self['latitude'] = $latitude;
        $self['longitude'] = $longitude;
        $self['notes'] = $notes;
        $self['startsAt'] = $startsAt;
        $self['state'] = $state;
        $self['title'] = $title;
        $self['zip'] = $zip;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withAddress(?string $address): self
    {
        $self = clone $this;
        $self['address'] = $address;

        return $self;
    }

    public function withCity(?string $city): self
    {
        $self = clone $this;
        $self['city'] = $city;

        return $self;
    }

    public function withCountry(?string $country): self
    {
        $self = clone $this;
        $self['country'] = $country;

        return $self;
    }

    public function withEndsAt(\DateTimeInterface $endsAt): self
    {
        $self = clone $this;
        $self['endsAt'] = $endsAt;

        return $self;
    }

    /**
     * @param array<string,mixed> $hours
     */
    public function withHours(array $hours): self
    {
        $self = clone $this;
        $self['hours'] = $hours;

        return $self;
    }

    public function withLatitude(?float $latitude): self
    {
        $self = clone $this;
        $self['latitude'] = $latitude;

        return $self;
    }

    public function withLongitude(?float $longitude): self
    {
        $self = clone $this;
        $self['longitude'] = $longitude;

        return $self;
    }

    public function withNotes(?string $notes): self
    {
        $self = clone $this;
        $self['notes'] = $notes;

        return $self;
    }

    public function withStartsAt(\DateTimeInterface $startsAt): self
    {
        $self = clone $this;
        $self['startsAt'] = $startsAt;

        return $self;
    }

    public function withState(?string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }

    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }

    public function withZip(?string $zip): self
    {
        $self = clone $this;
        $self['zip'] = $zip;

        return $self;
    }
}
