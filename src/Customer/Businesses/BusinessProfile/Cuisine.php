<?php

declare(strict_types=1);

namespace Eat518\Customer\Businesses\BusinessProfile;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;

/**
 * @phpstan-type CuisineShape = array{id: string, name: string, slug: string}
 */
final class Cuisine implements BaseModel
{
    /** @use SdkModel<CuisineShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public string $name;

    #[Required]
    public string $slug;

    /**
     * `new Cuisine()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Cuisine::with(id: ..., name: ..., slug: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Cuisine)->withID(...)->withName(...)->withSlug(...)
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
    public static function with(string $id, string $name, string $slug): self
    {
        $self = new self;

        $self['id'] = $id;
        $self['name'] = $name;
        $self['slug'] = $slug;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

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
