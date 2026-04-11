<?php

declare(strict_types=1);

namespace Eat518\Customer\Businesses\BusinessGetEventsResponse;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;
use Eat518\Customer\Businesses\BusinessGetEventsResponse\Data\Event;
use Eat518\Customer\Businesses\Pagination;

/**
 * @phpstan-import-type EventShape from \Eat518\Customer\Businesses\BusinessGetEventsResponse\Data\Event
 * @phpstan-import-type PaginationShape from \Eat518\Customer\Businesses\Pagination
 *
 * @phpstan-type DataShape = array{
 *   events: list<Event|EventShape>, pagination: Pagination|PaginationShape
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /** @var list<Event> $events */
    #[Required(list: Event::class)]
    public array $events;

    #[Required]
    public Pagination $pagination;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(events: ..., pagination: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withEvents(...)->withPagination(...)
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
     * @param list<Event|EventShape> $events
     * @param Pagination|PaginationShape $pagination
     */
    public static function with(
        array $events,
        Pagination|array $pagination
    ): self {
        $self = new self;

        $self['events'] = $events;
        $self['pagination'] = $pagination;

        return $self;
    }

    /**
     * @param list<Event|EventShape> $events
     */
    public function withEvents(array $events): self
    {
        $self = clone $this;
        $self['events'] = $events;

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
