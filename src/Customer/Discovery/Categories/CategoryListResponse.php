<?php

declare(strict_types=1);

namespace Eat518\Customer\Discovery\Categories;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;
use Eat518\Customer\Discovery\Categories\CategoryListResponse\Data;

/**
 * @phpstan-import-type DataShape from \Eat518\Customer\Discovery\Categories\CategoryListResponse\Data
 *
 * @phpstan-type CategoryListResponseShape = array{data: list<Data|DataShape>}
 */
final class CategoryListResponse implements BaseModel
{
    /** @use SdkModel<CategoryListResponseShape> */
    use SdkModel;

    /** @var list<Data> $data */
    #[Required(list: Data::class)]
    public array $data;

    /**
     * `new CategoryListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CategoryListResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CategoryListResponse)->withData(...)
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
     * @param list<Data|DataShape> $data
     */
    public static function with(array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<Data|DataShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
