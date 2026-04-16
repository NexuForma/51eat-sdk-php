<?php

declare(strict_types=1);

namespace Eat518\Customer\Discovery\Categories\Businesses\BusinessListResponse\Data\Business;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;

/**
 * @phpstan-type LatestBulletinShape = array{
 *   content: string, publishedAt: string, title: string
 * }
 */
final class LatestBulletin implements BaseModel
{
    /** @use SdkModel<LatestBulletinShape> */
    use SdkModel;

    #[Required]
    public string $content;

    #[Required('published_at')]
    public string $publishedAt;

    #[Required]
    public string $title;

    /**
     * `new LatestBulletin()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LatestBulletin::with(content: ..., publishedAt: ..., title: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LatestBulletin)->withContent(...)->withPublishedAt(...)->withTitle(...)
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
        string $content,
        string $publishedAt,
        string $title
    ): self {
        $self = new self;

        $self['content'] = $content;
        $self['publishedAt'] = $publishedAt;
        $self['title'] = $title;

        return $self;
    }

    public function withContent(string $content): self
    {
        $self = clone $this;
        $self['content'] = $content;

        return $self;
    }

    public function withPublishedAt(string $publishedAt): self
    {
        $self = clone $this;
        $self['publishedAt'] = $publishedAt;

        return $self;
    }

    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }
}
