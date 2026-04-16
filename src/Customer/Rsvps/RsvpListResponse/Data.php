<?php

declare(strict_types=1);

namespace Eat518\Customer\Rsvps\RsvpListResponse;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;
use Eat518\Customer\Businesses\Pagination;
use Eat518\Customer\Rsvps\RsvpListResponse\Data\Rsvp;

/**
 * @phpstan-import-type PaginationShape from \Eat518\Customer\Businesses\Pagination
 * @phpstan-import-type RsvpShape from \Eat518\Customer\Rsvps\RsvpListResponse\Data\Rsvp
 *
 * @phpstan-type DataShape = array{
 *   pagination: Pagination|PaginationShape, rsvps: list<Rsvp|RsvpShape>
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required]
    public Pagination $pagination;

    /** @var list<Rsvp> $rsvps */
    #[Required(list: Rsvp::class)]
    public array $rsvps;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(pagination: ..., rsvps: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withPagination(...)->withRsvps(...)
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
     * @param Pagination|PaginationShape $pagination
     * @param list<Rsvp|RsvpShape> $rsvps
     */
    public static function with(
        Pagination|array $pagination,
        array $rsvps
    ): self {
        $self = new self;

        $self['pagination'] = $pagination;
        $self['rsvps'] = $rsvps;

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

    /**
     * @param list<Rsvp|RsvpShape> $rsvps
     */
    public function withRsvps(array $rsvps): self
    {
        $self = clone $this;
        $self['rsvps'] = $rsvps;

        return $self;
    }
}
