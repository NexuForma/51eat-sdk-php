<?php

declare(strict_types=1);

namespace Eat518\Customer\Favorites;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;
use Eat518\Customer\Favorites\FavoriteListResponse\Data;

/**
 * @phpstan-import-type DataShape from \Eat518\Customer\Favorites\FavoriteListResponse\Data
 *
 * @phpstan-type FavoriteListResponseShape = array{data: Data|DataShape}
 */
final class FavoriteListResponse implements BaseModel
{
    /** @use SdkModel<FavoriteListResponseShape> */
    use SdkModel;

    #[Required]
    public Data $data;

    /**
     * `new FavoriteListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FavoriteListResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FavoriteListResponse)->withData(...)
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
     * @param Data|DataShape $data
     */
    public static function with(Data|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Data|DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
