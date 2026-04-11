<?php

declare(strict_types=1);

namespace Eat518\Customer\Discovery\Category\CategoryGetBusinessesResponse\Data;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;
use Eat518\Customer\Discovery\Category\CategoryGetBusinessesResponse\Data\Business\Badges;
use Eat518\Customer\Discovery\Category\CategoryGetBusinessesResponse\Data\Business\LatestBulletin;
use Eat518\Customer\Discovery\Category\CategoryGetBusinessesResponse\Data\Business\Location;

/**
 * @phpstan-import-type BadgesShape from \Eat518\Customer\Discovery\Category\CategoryGetBusinessesResponse\Data\Business\Badges
 * @phpstan-import-type LatestBulletinShape from \Eat518\Customer\Discovery\Category\CategoryGetBusinessesResponse\Data\Business\LatestBulletin
 * @phpstan-import-type LocationShape from \Eat518\Customer\Discovery\Category\CategoryGetBusinessesResponse\Data\Business\Location
 *
 * @phpstan-type BusinessShape = array{
 *   id: string,
 *   badges: Badges|BadgesShape,
 *   bio: string,
 *   category: string,
 *   createdAt: string,
 *   description: string,
 *   handle: string,
 *   hasBulletins: string,
 *   latestBulletin: null|LatestBulletin|LatestBulletinShape,
 *   location: Location|LocationShape,
 *   logo: string,
 *   name: string,
 *   photos: string,
 * }
 */
final class Business implements BaseModel
{
    /** @use SdkModel<BusinessShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public Badges $badges;

    #[Required]
    public string $bio;

    #[Required]
    public string $category;

    #[Required('created_at')]
    public string $createdAt;

    #[Required]
    public string $description;

    #[Required]
    public string $handle;

    #[Required('has_bulletins')]
    public string $hasBulletins;

    #[Required('latest_bulletin')]
    public ?LatestBulletin $latestBulletin;

    #[Required]
    public Location $location;

    #[Required]
    public string $logo;

    #[Required]
    public string $name;

    #[Required]
    public string $photos;

    /**
     * `new Business()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Business::with(
     *   id: ...,
     *   badges: ...,
     *   bio: ...,
     *   category: ...,
     *   createdAt: ...,
     *   description: ...,
     *   handle: ...,
     *   hasBulletins: ...,
     *   latestBulletin: ...,
     *   location: ...,
     *   logo: ...,
     *   name: ...,
     *   photos: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Business)
     *   ->withID(...)
     *   ->withBadges(...)
     *   ->withBio(...)
     *   ->withCategory(...)
     *   ->withCreatedAt(...)
     *   ->withDescription(...)
     *   ->withHandle(...)
     *   ->withHasBulletins(...)
     *   ->withLatestBulletin(...)
     *   ->withLocation(...)
     *   ->withLogo(...)
     *   ->withName(...)
     *   ->withPhotos(...)
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
     * @param Badges|BadgesShape $badges
     * @param LatestBulletin|LatestBulletinShape|null $latestBulletin
     * @param Location|LocationShape $location
     */
    public static function with(
        string $id,
        Badges|array $badges,
        string $bio,
        string $category,
        string $createdAt,
        string $description,
        string $handle,
        string $hasBulletins,
        LatestBulletin|array|null $latestBulletin,
        Location|array $location,
        string $logo,
        string $name,
        string $photos,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['badges'] = $badges;
        $self['bio'] = $bio;
        $self['category'] = $category;
        $self['createdAt'] = $createdAt;
        $self['description'] = $description;
        $self['handle'] = $handle;
        $self['hasBulletins'] = $hasBulletins;
        $self['latestBulletin'] = $latestBulletin;
        $self['location'] = $location;
        $self['logo'] = $logo;
        $self['name'] = $name;
        $self['photos'] = $photos;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param Badges|BadgesShape $badges
     */
    public function withBadges(Badges|array $badges): self
    {
        $self = clone $this;
        $self['badges'] = $badges;

        return $self;
    }

    public function withBio(string $bio): self
    {
        $self = clone $this;
        $self['bio'] = $bio;

        return $self;
    }

    public function withCategory(string $category): self
    {
        $self = clone $this;
        $self['category'] = $category;

        return $self;
    }

    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

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

    public function withHasBulletins(string $hasBulletins): self
    {
        $self = clone $this;
        $self['hasBulletins'] = $hasBulletins;

        return $self;
    }

    /**
     * @param LatestBulletin|LatestBulletinShape|null $latestBulletin
     */
    public function withLatestBulletin(
        LatestBulletin|array|null $latestBulletin
    ): self {
        $self = clone $this;
        $self['latestBulletin'] = $latestBulletin;

        return $self;
    }

    /**
     * @param Location|LocationShape $location
     */
    public function withLocation(Location|array $location): self
    {
        $self = clone $this;
        $self['location'] = $location;

        return $self;
    }

    public function withLogo(string $logo): self
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

    public function withPhotos(string $photos): self
    {
        $self = clone $this;
        $self['photos'] = $photos;

        return $self;
    }
}
