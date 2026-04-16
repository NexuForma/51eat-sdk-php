<?php

declare(strict_types=1);

namespace Eat518\Customer\Events;

use Eat518\Core\Attributes\Optional;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Concerns\SdkParams;
use Eat518\Core\Contracts\BaseModel;

/**
 * Retrieve a paginated feed of upcoming events across all businesses.
 * Defaults to all events starting from now, ordered by start date ascending.
 * Optionally filter by a date range using date_from and date_to.
 *
 * @see Eat518\Services\Customer\EventsService::list()
 *
 * @phpstan-type EventListParamsShape = array{
 *   dateFrom?: string|null,
 *   dateTo?: string|null,
 *   page?: int|null,
 *   perPage?: int|null,
 * }
 */
final class EventListParams implements BaseModel
{
    /** @use SdkModel<EventListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Lower bound for event start date (ISO 8601). Defaults to now.
     */
    #[Optional]
    public ?string $dateFrom;

    /**
     * Upper bound for event start date (ISO 8601).
     */
    #[Optional]
    public ?string $dateTo;

    /**
     * Page number.
     */
    #[Optional]
    public ?int $page;

    /**
     * Number of events per page.
     */
    #[Optional]
    public ?int $perPage;

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
        ?string $dateFrom = null,
        ?string $dateTo = null,
        ?int $page = null,
        ?int $perPage = null,
    ): self {
        $self = new self;

        null !== $dateFrom && $self['dateFrom'] = $dateFrom;
        null !== $dateTo && $self['dateTo'] = $dateTo;
        null !== $page && $self['page'] = $page;
        null !== $perPage && $self['perPage'] = $perPage;

        return $self;
    }

    /**
     * Lower bound for event start date (ISO 8601). Defaults to now.
     */
    public function withDateFrom(string $dateFrom): self
    {
        $self = clone $this;
        $self['dateFrom'] = $dateFrom;

        return $self;
    }

    /**
     * Upper bound for event start date (ISO 8601).
     */
    public function withDateTo(string $dateTo): self
    {
        $self = clone $this;
        $self['dateTo'] = $dateTo;

        return $self;
    }

    /**
     * Page number.
     */
    public function withPage(int $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }

    /**
     * Number of events per page.
     */
    public function withPerPage(int $perPage): self
    {
        $self = clone $this;
        $self['perPage'] = $perPage;

        return $self;
    }
}
