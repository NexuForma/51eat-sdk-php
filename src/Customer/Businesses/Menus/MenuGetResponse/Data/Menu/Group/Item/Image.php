<?php

declare(strict_types=1);

namespace Eat518\Customer\Businesses\Menus\MenuGetResponse\Data\Menu\Group\Item;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;

/**
 * @phpstan-type ImageShape = array{
 *   id: string,
 *   altText: string|null,
 *   createdAt: \DateTimeInterface|null,
 *   disk: string,
 *   filename: string,
 *   imageableID: string,
 *   imageableType: string,
 *   mimeType: string|null,
 *   originalFilename: string,
 *   path: string,
 *   size: int|null,
 *   sortOrder: int,
 *   updatedAt: \DateTimeInterface|null,
 *   url: string,
 * }
 */
final class Image implements BaseModel
{
    /** @use SdkModel<ImageShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required('alt_text')]
    public ?string $altText;

    #[Required('created_at')]
    public ?\DateTimeInterface $createdAt;

    #[Required]
    public string $disk;

    #[Required]
    public string $filename;

    #[Required('imageable_id')]
    public string $imageableID;

    #[Required('imageable_type')]
    public string $imageableType;

    #[Required('mime_type')]
    public ?string $mimeType;

    #[Required('original_filename')]
    public string $originalFilename;

    #[Required]
    public string $path;

    #[Required]
    public ?int $size;

    #[Required('sort_order')]
    public int $sortOrder;

    #[Required('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    #[Required]
    public string $url;

    /**
     * `new Image()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Image::with(
     *   id: ...,
     *   altText: ...,
     *   createdAt: ...,
     *   disk: ...,
     *   filename: ...,
     *   imageableID: ...,
     *   imageableType: ...,
     *   mimeType: ...,
     *   originalFilename: ...,
     *   path: ...,
     *   size: ...,
     *   sortOrder: ...,
     *   updatedAt: ...,
     *   url: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Image)
     *   ->withID(...)
     *   ->withAltText(...)
     *   ->withCreatedAt(...)
     *   ->withDisk(...)
     *   ->withFilename(...)
     *   ->withImageableID(...)
     *   ->withImageableType(...)
     *   ->withMimeType(...)
     *   ->withOriginalFilename(...)
     *   ->withPath(...)
     *   ->withSize(...)
     *   ->withSortOrder(...)
     *   ->withUpdatedAt(...)
     *   ->withURL(...)
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
        string $id,
        ?string $altText,
        ?\DateTimeInterface $createdAt,
        string $disk,
        string $filename,
        string $imageableID,
        string $imageableType,
        ?string $mimeType,
        string $originalFilename,
        string $path,
        ?int $size,
        int $sortOrder,
        ?\DateTimeInterface $updatedAt,
        string $url,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['altText'] = $altText;
        $self['createdAt'] = $createdAt;
        $self['disk'] = $disk;
        $self['filename'] = $filename;
        $self['imageableID'] = $imageableID;
        $self['imageableType'] = $imageableType;
        $self['mimeType'] = $mimeType;
        $self['originalFilename'] = $originalFilename;
        $self['path'] = $path;
        $self['size'] = $size;
        $self['sortOrder'] = $sortOrder;
        $self['updatedAt'] = $updatedAt;
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

    public function withCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withDisk(string $disk): self
    {
        $self = clone $this;
        $self['disk'] = $disk;

        return $self;
    }

    public function withFilename(string $filename): self
    {
        $self = clone $this;
        $self['filename'] = $filename;

        return $self;
    }

    public function withImageableID(string $imageableID): self
    {
        $self = clone $this;
        $self['imageableID'] = $imageableID;

        return $self;
    }

    public function withImageableType(string $imageableType): self
    {
        $self = clone $this;
        $self['imageableType'] = $imageableType;

        return $self;
    }

    public function withMimeType(?string $mimeType): self
    {
        $self = clone $this;
        $self['mimeType'] = $mimeType;

        return $self;
    }

    public function withOriginalFilename(string $originalFilename): self
    {
        $self = clone $this;
        $self['originalFilename'] = $originalFilename;

        return $self;
    }

    public function withPath(string $path): self
    {
        $self = clone $this;
        $self['path'] = $path;

        return $self;
    }

    public function withSize(?int $size): self
    {
        $self = clone $this;
        $self['size'] = $size;

        return $self;
    }

    public function withSortOrder(int $sortOrder): self
    {
        $self = clone $this;
        $self['sortOrder'] = $sortOrder;

        return $self;
    }

    public function withUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
