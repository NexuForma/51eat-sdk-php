<?php

declare(strict_types=1);

namespace Eat518\Services\Customer;

use Eat518\Client;
use Eat518\ServiceContracts\Customer\MessagingContract;
use Eat518\Services\Customer\Messaging\ConversationsService;

final class MessagingService implements MessagingContract
{
    /**
     * @api
     */
    public MessagingRawService $raw;

    /**
     * @api
     */
    public ConversationsService $conversations;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MessagingRawService($client);
        $this->conversations = new ConversationsService($client);
    }
}
