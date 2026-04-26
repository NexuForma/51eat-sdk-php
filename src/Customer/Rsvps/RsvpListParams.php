<?php

declare(strict_types=1);

namespace Eat518\Customer\Rsvps;

use Eat518\Core\Attributes\Optional;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Concerns\SdkParams;
use Eat518\Core\Contracts\BaseModel;

/**
 * Retrieve the authenticated user's event RSVPs with pagination.
 *
 * @see Eat518\Services\Customer\RsvpsService::list()
 *
 * @phpstan-type RsvpListParamsShape = array{
 *   page?: int|null, perPage?: int|null, status?: string|null
 * }
 */
final class RsvpListParams implements BaseModel
{
    /** @use SdkModel<RsvpListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Page number for pagination.
     */
    #[Optional]
    public ?int $page;

    /**
     * Number of RSVPs per page.
     */
    #[Optional]
    public ?int $perPage;

    /**
     * Filter by RSVP status.
     */
    #[Optional]
    public ?string $status;

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
        ?int $page = null,
        ?int $perPage = null,
        ?string $status = null
    ): self {
        $self = new self;

        null !== $page && $self['page'] = $page;
        null !== $perPage && $self['perPage'] = $perPage;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    /**
     * Page number for pagination.
     */
    public function withPage(int $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }

    /**
     * Number of RSVPs per page.
     */
    public function withPerPage(int $perPage): self
    {
        $self = clone $this;
        $self['perPage'] = $perPage;

        return $self;
    }

    /**
     * Filter by RSVP status.
     */
    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
