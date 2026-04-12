<?php

declare(strict_types=1);

namespace Eat518\Customer\Businesses\BusinessGetResponse;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;
use Eat518\Customer\Businesses\BusinessGetResponse\Data\Hour;

/**
 * @phpstan-import-type HourShape from \Eat518\Customer\Businesses\BusinessGetResponse\Data\Hour
 *
 * @phpstan-type DataShape = array{
 *   id: string,
 *   address: string,
 *   category: string,
 *   city: string,
 *   coverPhoto: string,
 *   description: string,
 *   handle: string,
 *   hours: array<string,Hour|HourShape>,
 *   latitude: float,
 *   logo: string,
 *   longitude: float,
 *   name: string,
 *   phone: string,
 *   state: string,
 *   website: string,
 *   zip: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public string $address;

    #[Required]
    public string $category;

    #[Required]
    public string $city;

    #[Required('cover_photo')]
    public string $coverPhoto;

    #[Required]
    public string $description;

    #[Required]
    public string $handle;

    /** @var array<string,Hour> $hours */
    #[Required(map: Hour::class)]
    public array $hours;

    #[Required]
    public float $latitude;

    #[Required]
    public string $logo;

    #[Required]
    public float $longitude;

    #[Required]
    public string $name;

    #[Required]
    public string $phone;

    #[Required]
    public string $state;

    #[Required]
    public string $website;

    #[Required]
    public string $zip;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   id: ...,
     *   address: ...,
     *   category: ...,
     *   city: ...,
     *   coverPhoto: ...,
     *   description: ...,
     *   handle: ...,
     *   hours: ...,
     *   latitude: ...,
     *   logo: ...,
     *   longitude: ...,
     *   name: ...,
     *   phone: ...,
     *   state: ...,
     *   website: ...,
     *   zip: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withID(...)
     *   ->withAddress(...)
     *   ->withCategory(...)
     *   ->withCity(...)
     *   ->withCoverPhoto(...)
     *   ->withDescription(...)
     *   ->withHandle(...)
     *   ->withHours(...)
     *   ->withLatitude(...)
     *   ->withLogo(...)
     *   ->withLongitude(...)
     *   ->withName(...)
     *   ->withPhone(...)
     *   ->withState(...)
     *   ->withWebsite(...)
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
     * @param array<string,Hour|HourShape> $hours
     */
    public static function with(
        string $id,
        string $address,
        string $category,
        string $city,
        string $coverPhoto,
        string $description,
        string $handle,
        array $hours,
        float $latitude,
        string $logo,
        float $longitude,
        string $name,
        string $phone,
        string $state,
        string $website,
        string $zip,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['address'] = $address;
        $self['category'] = $category;
        $self['city'] = $city;
        $self['coverPhoto'] = $coverPhoto;
        $self['description'] = $description;
        $self['handle'] = $handle;
        $self['hours'] = $hours;
        $self['latitude'] = $latitude;
        $self['logo'] = $logo;
        $self['longitude'] = $longitude;
        $self['name'] = $name;
        $self['phone'] = $phone;
        $self['state'] = $state;
        $self['website'] = $website;
        $self['zip'] = $zip;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withAddress(string $address): self
    {
        $self = clone $this;
        $self['address'] = $address;

        return $self;
    }

    public function withCategory(string $category): self
    {
        $self = clone $this;
        $self['category'] = $category;

        return $self;
    }

    public function withCity(string $city): self
    {
        $self = clone $this;
        $self['city'] = $city;

        return $self;
    }

    public function withCoverPhoto(string $coverPhoto): self
    {
        $self = clone $this;
        $self['coverPhoto'] = $coverPhoto;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withHandle(string $handle): self
    {
        $self = clone $this;
        $self['handle'] = $handle;

        return $self;
    }

    /**
     * @param array<string,Hour|HourShape> $hours
     */
    public function withHours(array $hours): self
    {
        $self = clone $this;
        $self['hours'] = $hours;

        return $self;
    }

    public function withLatitude(float $latitude): self
    {
        $self = clone $this;
        $self['latitude'] = $latitude;

        return $self;
    }

    public function withLogo(string $logo): self
    {
        $self = clone $this;
        $self['logo'] = $logo;

        return $self;
    }

    public function withLongitude(float $longitude): self
    {
        $self = clone $this;
        $self['longitude'] = $longitude;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withPhone(string $phone): self
    {
        $self = clone $this;
        $self['phone'] = $phone;

        return $self;
    }

    public function withState(string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }

    public function withWebsite(string $website): self
    {
        $self = clone $this;
        $self['website'] = $website;

        return $self;
    }

    public function withZip(string $zip): self
    {
        $self = clone $this;
        $self['zip'] = $zip;

        return $self;
    }
}
