<?php

declare(strict_types=1);

namespace Eat518\Customer\Discovery\Categories\Businesses\BusinessListResponse\Data;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;

/**
 * @phpstan-type FiltersShape = array{category: string, search: string}
 */
final class Filters implements BaseModel
{
    /** @use SdkModel<FiltersShape> */
    use SdkModel;

    #[Required]
    public string $category;

    #[Required]
    public string $search;

    /**
     * `new Filters()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Filters::with(category: ..., search: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Filters)->withCategory(...)->withSearch(...)
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
    public static function with(string $category, string $search): self
    {
        $self = new self;

        $self['category'] = $category;
        $self['search'] = $search;

        return $self;
    }

    public function withCategory(string $category): self
    {
        $self = clone $this;
        $self['category'] = $category;

        return $self;
    }

    public function withSearch(string $search): self
    {
        $self = clone $this;
        $self['search'] = $search;

        return $self;
    }
}
