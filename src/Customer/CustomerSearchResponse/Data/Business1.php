<?php

declare(strict_types=1);

namespace Eat518\Customer\CustomerSearchResponse\Data;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;

/**
 * @phpstan-type Business1Shape = array{
 *   id: string,
 *   category: string|null,
 *   city: string|null,
 *   coverPhoto: string|null,
 *   favoritesCount: int,
 *   handle: string,
 *   isFavorited: bool,
 *   logo: string|null,
 *   name: string,
 *   state: string|null,
 * }
 */
final class Business1 implements BaseModel
{
    /** @use SdkModel<Business1Shape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public ?string $category;

    #[Required]
    public ?string $city;

    #[Required('cover_photo')]
    public ?string $coverPhoto;

    #[Required('favorites_count')]
    public int $favoritesCount;

    #[Required]
    public string $handle;

    #[Required('is_favorited')]
    public bool $isFavorited;

    #[Required]
    public ?string $logo;

    #[Required]
    public string $name;

    #[Required]
    public ?string $state;

    /**
     * `new Business1()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Business1::with(
     *   id: ...,
     *   category: ...,
     *   city: ...,
     *   coverPhoto: ...,
     *   favoritesCount: ...,
     *   handle: ...,
     *   isFavorited: ...,
     *   logo: ...,
     *   name: ...,
     *   state: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Business1)
     *   ->withID(...)
     *   ->withCategory(...)
     *   ->withCity(...)
     *   ->withCoverPhoto(...)
     *   ->withFavoritesCount(...)
     *   ->withHandle(...)
     *   ->withIsFavorited(...)
     *   ->withLogo(...)
     *   ->withName(...)
     *   ->withState(...)
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
        ?string $city,
        ?string $coverPhoto,
        int $favoritesCount,
        string $handle,
        bool $isFavorited,
        ?string $logo,
        string $name,
        ?string $state,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['category'] = $category;
        $self['city'] = $city;
        $self['coverPhoto'] = $coverPhoto;
        $self['favoritesCount'] = $favoritesCount;
        $self['handle'] = $handle;
        $self['isFavorited'] = $isFavorited;
        $self['logo'] = $logo;
        $self['name'] = $name;
        $self['state'] = $state;

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

    public function withCity(?string $city): self
    {
        $self = clone $this;
        $self['city'] = $city;

        return $self;
    }

    public function withCoverPhoto(?string $coverPhoto): self
    {
        $self = clone $this;
        $self['coverPhoto'] = $coverPhoto;

        return $self;
    }

    public function withFavoritesCount(int $favoritesCount): self
    {
        $self = clone $this;
        $self['favoritesCount'] = $favoritesCount;

        return $self;
    }

    public function withHandle(string $handle): self
    {
        $self = clone $this;
        $self['handle'] = $handle;

        return $self;
    }

    public function withIsFavorited(bool $isFavorited): self
    {
        $self = clone $this;
        $self['isFavorited'] = $isFavorited;

        return $self;
    }

    public function withLogo(?string $logo): self
    {
        $self = clone $this;
        $self['logo'] = $logo;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withState(?string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }
}
