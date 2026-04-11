<?php

declare(strict_types=1);

namespace Eat518\Services\Customer\Messaging\Conversations;

use Eat518\Client;
use Eat518\Core\Exceptions\APIException;
use Eat518\Core\Util;
use Eat518\Customer\Messaging\Conversations\Messages\MessageGetUnreadCountResponse;
use Eat518\Customer\Messaging\Conversations\Messages\MessageListResponse;
use Eat518\Customer\Messaging\Conversations\Messages\MessageMarkReadResponse;
use Eat518\Customer\Messaging\Conversations\Messages\MessageSendResponse;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\Messaging\Conversations\MessagesContract;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class MessagesService implements MessagesContract
{
    /**
     * @api
     */
    public MessagesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MessagesRawService($client);
    }

    /**
     * @api
     *
     * Retrieve a paginated list of all messages in a specific conversation,
     * ordered by creation time (oldest first).
     *
     * @param string $conversation The conversation ID
     * @param int $page Page number for pagination
     * @param int $perPage Number of messages per page
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $conversation,
        ?int $page = null,
        ?int $perPage = null,
        RequestOptions|array|null $requestOptions = null,
    ): MessageListResponse {
        $params = Util::removeNulls(['page' => $page, 'perPage' => $perPage]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($conversation, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the count of unread messages in a specific conversation for the authenticated customer.
     *
     * @param string $conversation The conversation ID
     * @param RequestOpts|null $requestOptions
     *
     * @return value-of<MessageGetUnreadCountResponse>
     *
     * @throws APIException
     */
    public function getUnreadCount(
        string $conversation,
        RequestOptions|array|null $requestOptions = null
    ): int {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getUnreadCount($conversation, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Mark all messages in a conversation as read by the authenticated customer.
     * This is typically called when the customer opens a conversation.
     *
     * @param string $conversation The conversation ID
     * @param RequestOpts|null $requestOptions
     *
     * @return value-of<MessageMarkReadResponse>
     *
     * @throws APIException
     */
    public function markRead(
        string $conversation,
        RequestOptions|array|null $requestOptions = null
    ): int {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->markRead($conversation, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Send a new message to a specific conversation. The message will be marked
     * as sent by the authenticated customer.
     *
     * @param string $conversation The conversation ID
     * @param string $content The message content
     * @param string $messageType The type of message
     * @param mixed $metadata Additional metadata for the message
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function send(
        string $conversation,
        string $content,
        ?string $messageType = null,
        mixed $metadata = null,
        RequestOptions|array|null $requestOptions = null,
    ): MessageSendResponse {
        $params = Util::removeNulls(
            [
                'content' => $content,
                'messageType' => $messageType,
                'metadata' => $metadata,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->send($conversation, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
