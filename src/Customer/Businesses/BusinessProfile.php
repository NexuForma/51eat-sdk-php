<?php

declare(strict_types=1);

namespace Eat518\Customer\Businesses;

use Eat518\Core\Attributes\Optional;
use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;
use Eat518\Customer\Businesses\BusinessProfile\Certification;
use Eat518\Customer\Businesses\BusinessProfile\Cuisine;
use Eat518\Customer\Businesses\BusinessProfile\Hour;
use Eat518\Customer\Businesses\BusinessProfile\TemporaryLocation;

/**
 * @phpstan-import-type HourShape from \Eat518\Customer\Businesses\BusinessProfile\Hour
 * @phpstan-import-type CertificationShape from \Eat518\Customer\Businesses\BusinessProfile\Certification
 * @phpstan-import-type CuisineShape from \Eat518\Customer\Businesses\BusinessProfile\Cuisine
 * @phpstan-import-type TemporaryLocationShape from \Eat518\Customer\Businesses\BusinessProfile\TemporaryLocation
 *
 * @phpstan-type BusinessProfileShape = array{
 *   id: string,
 *   address: string|null,
 *   badges: list<string>,
 *   bio: string|null,
 *   category: string|null,
 *   city: string|null,
 *   country: string|null,
 *   description: string|null,
 *   email: string|null,
 *   facebookURL: string|null,
 *   favoritesCount: int,
 *   foundingPartner: bool,
 *   handle: string,
 *   hasLocation: bool,
 *   hours: array<string,Hour|HourShape>,
 *   instagramURL: string|null,
 *   isFavorited: bool,
 *   latitude: float|null,
 *   linkedinURL: string|null,
 *   logo: string|null,
 *   longitude: float|null,
 *   metadata: array<string,mixed>,
 *   name: string,
 *   operatingMonths: list<string>,
 *   ownership: list<string>,
 *   phone: string|null,
 *   seasonal: bool,
 *   staffPick: bool,
 *   state: string|null,
 *   tiktokURL: string|null,
 *   twitterURL: string|null,
 *   website: string|null,
 *   youtubeURL: string|null,
 *   zip: string|null,
 *   certifications?: list<Certification|CertificationShape>|null,
 *   coverPhoto?: string|null,
 *   cuisines?: list<Cuisine|CuisineShape>|null,
 *   temporaryLocations?: list<TemporaryLocation|TemporaryLocationShape>|null,
 * }
 */
final class BusinessProfile implements BaseModel
{
    /** @use SdkModel<BusinessProfileShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public ?string $address;

    /** @var list<string> $badges */
    #[Required(list: 'string')]
    public array $badges;

    #[Required]
    public ?string $bio;

    #[Required]
    public ?string $category;

    #[Required]
    public ?string $city;

    #[Required]
    public ?string $country;

    #[Required]
    public ?string $description;

    #[Required]
    public ?string $email;

    #[Required('facebook_url')]
    public ?string $facebookURL;

    #[Required('favorites_count')]
    public int $favoritesCount;

    #[Required('founding_partner')]
    public bool $foundingPartner;

    #[Required]
    public string $handle;

    #[Required('has_location')]
    public bool $hasLocation;

    /** @var array<string,Hour> $hours */
    #[Required(map: Hour::class)]
    public array $hours;

    #[Required('instagram_url')]
    public ?string $instagramURL;

    #[Required('is_favorited')]
    public bool $isFavorited;

    #[Required]
    public ?float $latitude;

    #[Required('linkedin_url')]
    public ?string $linkedinURL;

    #[Required]
    public ?string $logo;

    #[Required]
    public ?float $longitude;

    /** @var array<string,mixed> $metadata */
    #[Required(map: 'mixed')]
    public array $metadata;

    #[Required]
    public string $name;

    /** @var list<string> $operatingMonths */
    #[Required('operating_months', list: 'string')]
    public array $operatingMonths;

    /** @var list<string> $ownership */
    #[Required(list: 'string')]
    public array $ownership;

    #[Required]
    public ?string $phone;

    #[Required]
    public bool $seasonal;

    #[Required('staff_pick')]
    public bool $staffPick;

    #[Required]
    public ?string $state;

    #[Required('tiktok_url')]
    public ?string $tiktokURL;

    #[Required('twitter_url')]
    public ?string $twitterURL;

    #[Required]
    public ?string $website;

    #[Required('youtube_url')]
    public ?string $youtubeURL;

    #[Required]
    public ?string $zip;

    /** @var list<Certification>|null $certifications */
    #[Optional(list: Certification::class)]
    public ?array $certifications;

    #[Optional('cover_photo', nullable: true)]
    public ?string $coverPhoto;

    /** @var list<Cuisine>|null $cuisines */
    #[Optional(list: Cuisine::class)]
    public ?array $cuisines;

    /** @var list<TemporaryLocation>|null $temporaryLocations */
    #[Optional('temporary_locations', list: TemporaryLocation::class)]
    public ?array $temporaryLocations;

    /**
     * `new BusinessProfile()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BusinessProfile::with(
     *   id: ...,
     *   address: ...,
     *   badges: ...,
     *   bio: ...,
     *   category: ...,
     *   city: ...,
     *   country: ...,
     *   description: ...,
     *   email: ...,
     *   facebookURL: ...,
     *   favoritesCount: ...,
     *   foundingPartner: ...,
     *   handle: ...,
     *   hasLocation: ...,
     *   hours: ...,
     *   instagramURL: ...,
     *   isFavorited: ...,
     *   latitude: ...,
     *   linkedinURL: ...,
     *   logo: ...,
     *   longitude: ...,
     *   metadata: ...,
     *   name: ...,
     *   operatingMonths: ...,
     *   ownership: ...,
     *   phone: ...,
     *   seasonal: ...,
     *   staffPick: ...,
     *   state: ...,
     *   tiktokURL: ...,
     *   twitterURL: ...,
     *   website: ...,
     *   youtubeURL: ...,
     *   zip: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BusinessProfile)
     *   ->withID(...)
     *   ->withAddress(...)
     *   ->withBadges(...)
     *   ->withBio(...)
     *   ->withCategory(...)
     *   ->withCity(...)
     *   ->withCountry(...)
     *   ->withDescription(...)
     *   ->withEmail(...)
     *   ->withFacebookURL(...)
     *   ->withFavoritesCount(...)
     *   ->withFoundingPartner(...)
     *   ->withHandle(...)
     *   ->withHasLocation(...)
     *   ->withHours(...)
     *   ->withInstagramURL(...)
     *   ->withIsFavorited(...)
     *   ->withLatitude(...)
     *   ->withLinkedinURL(...)
     *   ->withLogo(...)
     *   ->withLongitude(...)
     *   ->withMetadata(...)
     *   ->withName(...)
     *   ->withOperatingMonths(...)
     *   ->withOwnership(...)
     *   ->withPhone(...)
     *   ->withSeasonal(...)
     *   ->withStaffPick(...)
     *   ->withState(...)
     *   ->withTiktokURL(...)
     *   ->withTwitterURL(...)
     *   ->withWebsite(...)
     *   ->withYoutubeURL(...)
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
     * @param list<string> $badges
     * @param array<string,Hour|HourShape> $hours
     * @param array<string,mixed> $metadata
     * @param list<string> $operatingMonths
     * @param list<string> $ownership
     * @param list<Certification|CertificationShape>|null $certifications
     * @param list<Cuisine|CuisineShape>|null $cuisines
     * @param list<TemporaryLocation|TemporaryLocationShape>|null $temporaryLocations
     */
    public static function with(
        string $id,
        ?string $address,
        array $badges,
        ?string $bio,
        ?string $category,
        ?string $city,
        ?string $country,
        ?string $description,
        ?string $email,
        ?string $facebookURL,
        int $favoritesCount,
        bool $foundingPartner,
        string $handle,
        bool $hasLocation,
        array $hours,
        ?string $instagramURL,
        bool $isFavorited,
        ?float $latitude,
        ?string $linkedinURL,
        ?string $logo,
        ?float $longitude,
        array $metadata,
        string $name,
        array $operatingMonths,
        array $ownership,
        ?string $phone,
        bool $seasonal,
        bool $staffPick,
        ?string $state,
        ?string $tiktokURL,
        ?string $twitterURL,
        ?string $website,
        ?string $youtubeURL,
        ?string $zip,
        ?array $certifications = null,
        ?string $coverPhoto = null,
        ?array $cuisines = null,
        ?array $temporaryLocations = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['address'] = $address;
        $self['badges'] = $badges;
        $self['bio'] = $bio;
        $self['category'] = $category;
        $self['city'] = $city;
        $self['country'] = $country;
        $self['description'] = $description;
        $self['email'] = $email;
        $self['facebookURL'] = $facebookURL;
        $self['favoritesCount'] = $favoritesCount;
        $self['foundingPartner'] = $foundingPartner;
        $self['handle'] = $handle;
        $self['hasLocation'] = $hasLocation;
        $self['hours'] = $hours;
        $self['instagramURL'] = $instagramURL;
        $self['isFavorited'] = $isFavorited;
        $self['latitude'] = $latitude;
        $self['linkedinURL'] = $linkedinURL;
        $self['logo'] = $logo;
        $self['longitude'] = $longitude;
        $self['metadata'] = $metadata;
        $self['name'] = $name;
        $self['operatingMonths'] = $operatingMonths;
        $self['ownership'] = $ownership;
        $self['phone'] = $phone;
        $self['seasonal'] = $seasonal;
        $self['staffPick'] = $staffPick;
        $self['state'] = $state;
        $self['tiktokURL'] = $tiktokURL;
        $self['twitterURL'] = $twitterURL;
        $self['website'] = $website;
        $self['youtubeURL'] = $youtubeURL;
        $self['zip'] = $zip;

        null !== $certifications && $self['certifications'] = $certifications;
        null !== $coverPhoto && $self['coverPhoto'] = $coverPhoto;
        null !== $cuisines && $self['cuisines'] = $cuisines;
        null !== $temporaryLocations && $self['temporaryLocations'] = $temporaryLocations;

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

    /**
     * @param list<string> $badges
     */
    public function withBadges(array $badges): self
    {
        $self = clone $this;
        $self['badges'] = $badges;

        return $self;
    }

    public function withBio(?string $bio): self
    {
        $self = clone $this;
        $self['bio'] = $bio;

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

    public function withCountry(?string $country): self
    {
        $self = clone $this;
        $self['country'] = $country;

        return $self;
    }

    public function withDescription(?string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withEmail(?string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    public function withFacebookURL(?string $facebookURL): self
    {
        $self = clone $this;
        $self['facebookURL'] = $facebookURL;

        return $self;
    }

    public function withFavoritesCount(int $favoritesCount): self
    {
        $self = clone $this;
        $self['favoritesCount'] = $favoritesCount;

        return $self;
    }

    public function withFoundingPartner(bool $foundingPartner): self
    {
        $self = clone $this;
        $self['foundingPartner'] = $foundingPartner;

        return $self;
    }

    public function withHandle(string $handle): self
    {
        $self = clone $this;
        $self['handle'] = $handle;

        return $self;
    }

    public function withHasLocation(bool $hasLocation): self
    {
        $self = clone $this;
        $self['hasLocation'] = $hasLocation;

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

    public function withInstagramURL(?string $instagramURL): self
    {
        $self = clone $this;
        $self['instagramURL'] = $instagramURL;

        return $self;
    }

    public function withIsFavorited(bool $isFavorited): self
    {
        $self = clone $this;
        $self['isFavorited'] = $isFavorited;

        return $self;
    }

    public function withLatitude(?float $latitude): self
    {
        $self = clone $this;
        $self['latitude'] = $latitude;

        return $self;
    }

    public function withLinkedinURL(?string $linkedinURL): self
    {
        $self = clone $this;
        $self['linkedinURL'] = $linkedinURL;

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

    /**
     * @param array<string,mixed> $metadata
     */
    public function withMetadata(array $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * @param list<string> $operatingMonths
     */
    public function withOperatingMonths(array $operatingMonths): self
    {
        $self = clone $this;
        $self['operatingMonths'] = $operatingMonths;

        return $self;
    }

    /**
     * @param list<string> $ownership
     */
    public function withOwnership(array $ownership): self
    {
        $self = clone $this;
        $self['ownership'] = $ownership;

        return $self;
    }

    public function withPhone(?string $phone): self
    {
        $self = clone $this;
        $self['phone'] = $phone;

        return $self;
    }

    public function withSeasonal(bool $seasonal): self
    {
        $self = clone $this;
        $self['seasonal'] = $seasonal;

        return $self;
    }

    public function withStaffPick(bool $staffPick): self
    {
        $self = clone $this;
        $self['staffPick'] = $staffPick;

        return $self;
    }

    public function withState(?string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }

    public function withTiktokURL(?string $tiktokURL): self
    {
        $self = clone $this;
        $self['tiktokURL'] = $tiktokURL;

        return $self;
    }

    public function withTwitterURL(?string $twitterURL): self
    {
        $self = clone $this;
        $self['twitterURL'] = $twitterURL;

        return $self;
    }

    public function withWebsite(?string $website): self
    {
        $self = clone $this;
        $self['website'] = $website;

        return $self;
    }

    public function withYoutubeURL(?string $youtubeURL): self
    {
        $self = clone $this;
        $self['youtubeURL'] = $youtubeURL;

        return $self;
    }

    public function withZip(?string $zip): self
    {
        $self = clone $this;
        $self['zip'] = $zip;

        return $self;
    }

    /**
     * @param list<Certification|CertificationShape> $certifications
     */
    public function withCertifications(array $certifications): self
    {
        $self = clone $this;
        $self['certifications'] = $certifications;

        return $self;
    }

    public function withCoverPhoto(?string $coverPhoto): self
    {
        $self = clone $this;
        $self['coverPhoto'] = $coverPhoto;

        return $self;
    }

    /**
     * @param list<Cuisine|CuisineShape> $cuisines
     */
    public function withCuisines(array $cuisines): self
    {
        $self = clone $this;
        $self['cuisines'] = $cuisines;

        return $self;
    }

    /**
     * @param list<TemporaryLocation|TemporaryLocationShape> $temporaryLocations
     */
    public function withTemporaryLocations(array $temporaryLocations): self
    {
        $self = clone $this;
        $self['temporaryLocations'] = $temporaryLocations;

        return $self;
    }
}
