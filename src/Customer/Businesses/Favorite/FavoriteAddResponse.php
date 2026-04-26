<?php

declare(strict_types=1);

namespace Eat518\Customer\Businesses\Favorite;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;

/**
 * @phpstan-type FavoriteAddResponseShape = array{favorited: bool}
 */
final class FavoriteAddResponse implements BaseModel
{
    /** @use SdkModel<FavoriteAddResponseShape> */
    use SdkModel;

    #[Required]
    public bool $favorited;

    /**
     * `new FavoriteAddResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FavoriteAddResponse::with(favorited: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FavoriteAddResponse)->withFavorited(...)
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
    public static function with(bool $favorited): self
    {
        $self = new self;

        $self['favorited'] = $favorited;

        return $self;
    }

    public function withFavorited(bool $favorited): self
    {
        $self = clone $this;
        $self['favorited'] = $favorited;

        return $self;
    }
}
