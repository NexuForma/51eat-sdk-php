<?php

declare(strict_types=1);

namespace Eat518\Customer\Businesses\Bulletins\BulletinListResponse\Data;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;

/**
 * @phpstan-type BulletinShape = array{
 *   id: string,
 *   content: string|null,
 *   publishedAt: \DateTimeInterface|null,
 *   title: string|null,
 * }
 */
final class Bulletin implements BaseModel
{
    /** @use SdkModel<BulletinShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public ?string $content;

    #[Required('published_at')]
    public ?\DateTimeInterface $publishedAt;

    #[Required]
    public ?string $title;

    /**
     * `new Bulletin()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Bulletin::with(id: ..., content: ..., publishedAt: ..., title: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Bulletin)
     *   ->withID(...)
     *   ->withContent(...)
     *   ->withPublishedAt(...)
     *   ->withTitle(...)
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
        ?string $content,
        ?\DateTimeInterface $publishedAt,
        ?string $title,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['content'] = $content;
        $self['publishedAt'] = $publishedAt;
        $self['title'] = $title;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withContent(?string $content): self
    {
        $self = clone $this;
        $self['content'] = $content;

        return $self;
    }

    public function withPublishedAt(?\DateTimeInterface $publishedAt): self
    {
        $self = clone $this;
        $self['publishedAt'] = $publishedAt;

        return $self;
    }

    public function withTitle(?string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }
}
