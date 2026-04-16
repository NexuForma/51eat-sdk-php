<?php

declare(strict_types=1);

namespace Eat518\Customer\Businesses\Menus;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;
use Eat518\Customer\Businesses\Menus\MenuGetResponse\Data;

/**
 * @phpstan-import-type DataShape from \Eat518\Customer\Businesses\Menus\MenuGetResponse\Data
 *
 * @phpstan-type MenuGetResponseShape = array{data: Data|DataShape}
 */
final class MenuGetResponse implements BaseModel
{
    /** @use SdkModel<MenuGetResponseShape> */
    use SdkModel;

    #[Required]
    public Data $data;

    /**
     * `new MenuGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MenuGetResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MenuGetResponse)->withData(...)
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
