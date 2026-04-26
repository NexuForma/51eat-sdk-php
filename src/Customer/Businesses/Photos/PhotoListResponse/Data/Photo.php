<?php

declare(strict_types=1);

namespace Eat518\Customer\Businesses\Photos\PhotoListResponse\Data;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;

/**
 * @phpstan-type PhotoShape = array{id: string, altText: string|null, url: string}
 */
final class Photo implements BaseModel
{
    /** @use SdkModel<PhotoShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required('alt_text')]
    public ?string $altText;

    #[Required]
    public string $url;

    /**
     * `new Photo()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Photo::with(id: ..., altText: ..., url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Photo)->withID(...)->withAltText(...)->withURL(...)
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
    public static function with(string $id, ?string $altText, string $url): self
    {
        $self = new self;

        $self['id'] = $id;
        $self['altText'] = $altText;
        $self['url'] = $url;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withAltText(?string $altText): self
    {
        $self = clone $this;
        $self['altText'] = $altText;

        return $self;
    }

    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
