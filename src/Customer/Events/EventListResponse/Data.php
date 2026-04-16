<?php

declare(strict_types=1);

namespace Eat518\Customer\Events\EventListResponse;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;
use Eat518\Customer\Businesses\Pagination;
use Eat518\Customer\Events\EventFeedItem;

/**
 * @phpstan-import-type EventFeedItemShape from \Eat518\Customer\Events\EventFeedItem
 * @phpstan-import-type PaginationShape from \Eat518\Customer\Businesses\Pagination
 *
 * @phpstan-type DataShape = array{
 *   events: list<EventFeedItem|EventFeedItemShape>,
 *   featured: list<EventFeedItem|EventFeedItemShape>,
 *   pagination: Pagination|PaginationShape,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /** @var list<EventFeedItem> $events */
    #[Required(list: EventFeedItem::class)]
    public array $events;

    /** @var list<EventFeedItem> $featured */
    #[Required(list: EventFeedItem::class)]
    public array $featured;

    #[Required]
    public Pagination $pagination;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(events: ..., featured: ..., pagination: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withEvents(...)->withFeatured(...)->withPagination(...)
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
     * @param list<EventFeedItem|EventFeedItemShape> $events
     * @param list<EventFeedItem|EventFeedItemShape> $featured
     * @param Pagination|PaginationShape $pagination
     */
    public static function with(
        array $events,
        array $featured,
        Pagination|array $pagination
    ): self {
        $self = new self;

        $self['events'] = $events;
        $self['featured'] = $featured;
        $self['pagination'] = $pagination;

        return $self;
    }

    /**
     * @param list<EventFeedItem|EventFeedItemShape> $events
     */
    public function withEvents(array $events): self
    {
        $self = clone $this;
        $self['events'] = $events;

        return $self;
    }

    /**
     * @param list<EventFeedItem|EventFeedItemShape> $featured
     */
    public function withFeatured(array $featured): self
    {
        $self = clone $this;
        $self['featured'] = $featured;

        return $self;
    }

    /**
     * @param Pagination|PaginationShape $pagination
     */
    public function withPagination(Pagination|array $pagination): self
    {
        $self = clone $this;
        $self['pagination'] = $pagination;

        return $self;
    }
}
