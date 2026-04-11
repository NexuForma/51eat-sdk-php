<?php

declare(strict_types=1);

namespace Eat518\Customer\Messaging\Conversations\Messages;

use Eat518\Core\Attributes\Optional;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Concerns\SdkParams;
use Eat518\Core\Contracts\BaseModel;

/**
 * Retrieve a paginated list of all messages in a specific conversation,
 * ordered by creation time (oldest first).
 *
 * @see Eat518\Services\Customer\Messaging\Conversations\MessagesService::list()
 *
 * @phpstan-type MessageListParamsShape = array{
 *   page?: int|null, perPage?: int|null
 * }
 */
final class MessageListParams implements BaseModel
{
    /** @use SdkModel<MessageListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Page number for pagination.
     */
    #[Optional]
    public ?int $page;

    /**
     * Number of messages per page.
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
    public static function with(?int $page = null, ?int $perPage = null): self
    {
        $self = new self;

        null !== $page && $self['page'] = $page;
        null !== $perPage && $self['perPage'] = $perPage;

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
     * Number of messages per page.
     */
    public function withPerPage(int $perPage): self
    {
        $self = clone $this;
        $self['perPage'] = $perPage;

        return $self;
    }
}
