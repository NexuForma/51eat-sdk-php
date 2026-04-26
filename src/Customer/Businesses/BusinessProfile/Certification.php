<?php

declare(strict_types=1);

namespace Eat518\Customer\Businesses\BusinessProfile;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;

/**
 * @phpstan-type CertificationShape = array{
 *   id: int, icon: string|null, name: string, slug: string
 * }
 */
final class Certification implements BaseModel
{
    /** @use SdkModel<CertificationShape> */
    use SdkModel;

    #[Required]
    public int $id;

    #[Required]
    public ?string $icon;

    #[Required]
    public string $name;

    #[Required]
    public string $slug;

    /**
     * `new Certification()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Certification::with(id: ..., icon: ..., name: ..., slug: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Certification)->withID(...)->withIcon(...)->withName(...)->withSlug(...)
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
        int $id,
        ?string $icon,
        string $name,
        string $slug
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['icon'] = $icon;
        $self['name'] = $name;
        $self['slug'] = $slug;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withIcon(?string $icon): self
    {
        $self = clone $this;
        $self['icon'] = $icon;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withSlug(string $slug): self
    {
        $self = clone $this;
        $self['slug'] = $slug;

        return $self;
    }
}
