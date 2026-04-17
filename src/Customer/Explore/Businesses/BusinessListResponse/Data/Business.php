<?php

declare(strict_types=1);

namespace Eat518\Customer\Explore\Businesses\BusinessListResponse\Data;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;

/**
 * @phpstan-type BusinessShape = array{
 *   id: string,
 *   category: string|null,
 *   handle: string,
 *   hasBulletins: bool,
 *   latitude: float|null,
 *   logo: string|null,
 *   longitude: float|null,
 *   name: string,
 * }
 */
final class Business implements BaseModel
{
    /** @use SdkModel<BusinessShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public ?string $category;

    #[Required]
    public string $handle;

    #[Required('has_bulletins')]
    public bool $hasBulletins;

    #[Required]
    public ?float $latitude;

    #[Required]
    public ?string $logo;

    #[Required]
    public ?float $longitude;

    #[Required]
    public string $name;

    /**
     * `new Business()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Business::with(
     *   id: ...,
     *   category: ...,
     *   handle: ...,
     *   hasBulletins: ...,
     *   latitude: ...,
     *   logo: ...,
     *   longitude: ...,
     *   name: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Business)
     *   ->withID(...)
     *   ->withCategory(...)
     *   ->withHandle(...)
     *   ->withHasBulletins(...)
     *   ->withLatitude(...)
     *   ->withLogo(...)
     *   ->withLongitude(...)
     *   ->withName(...)
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
        ?string $category,
        string $handle,
        bool $hasBulletins,
        ?float $latitude,
        ?string $logo,
        ?float $longitude,
        string $name,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['category'] = $category;
        $self['handle'] = $handle;
        $self['hasBulletins'] = $hasBulletins;
        $self['latitude'] = $latitude;
        $self['logo'] = $logo;
        $self['longitude'] = $longitude;
        $self['name'] = $name;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCategory(?string $category): self
    {
        $self = clone $this;
        $self['category'] = $category;

        return $self;
    }

    public function withHandle(string $handle): self
    {
        $self = clone $this;
        $self['handle'] = $handle;

        return $self;
    }

    public function withHasBulletins(bool $hasBulletins): self
    {
        $self = clone $this;
        $self['hasBulletins'] = $hasBulletins;

        return $self;
    }

    public function withLatitude(?float $latitude): self
    {
        $self = clone $this;
        $self['latitude'] = $latitude;

        return $self;
    }

    public function withLogo(?string $logo): self
    {
        $self = clone $this;
        $self['logo'] = $logo;

        return $self;
    }

    public function withLongitude(?float $longitude): self
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
}
