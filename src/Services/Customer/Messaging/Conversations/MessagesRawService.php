<?php

declare(strict_types=1);

namespace Eat518\Services\Customer\Messaging\Conversations;

use Eat518\Client;
use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
use Eat518\Core\Util;
use Eat518\Customer\Messaging\Conversations\Messages\MessageGetUnreadCountResponse;
use Eat518\Customer\Messaging\Conversations\Messages\MessageListParams;
use Eat518\Customer\Messaging\Conversations\Messages\MessageListResponse;
use Eat518\Customer\Messaging\Conversations\Messages\MessageMarkReadResponse;
use Eat518\Customer\Messaging\Conversations\Messages\MessageSendParams;
use Eat518\Customer\Messaging\Conversations\Messages\MessageSendResponse;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\Messaging\Conversations\MessagesRawContract;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class MessagesRawService implements MessagesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a paginated list of all messages in a specific conversation,
     * ordered by creation time (oldest first).
     *
     * @param string $conversation The conversation ID
     * @param array{page?: int, perPage?: int}|MessageListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $conversation,
        array|MessageListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessageListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['customer/messaging/conversations/%1$s/messages', $conversation],
            query: Util::array_transform_keys($parsed, ['perPage' => 'per_page']),
            options: $options,
            convert: MessageListResponse::class,
        );
    }

    /**
     * @api
     *
     * Get the count of unread messages in a specific conversation for the authenticated customer.
     *
     * @param string $conversation The conversation ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<value-of<MessageGetUnreadCountResponse>>
     *
     * @throws APIException
     */
    public function getUnreadCount(
        string $conversation,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'customer/messaging/conversations/%1$s/messages/unread-count',
                $conversation,
            ],
            options: $requestOptions,
            convert: MessageGetUnreadCountResponse::class,
        );
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
     * @return BaseResponse<value-of<MessageMarkReadResponse>>
     *
     * @throws APIException
     */
    public function markRead(
        string $conversation,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'customer/messaging/conversations/%1$s/messages/mark-read',
                $conversation,
            ],
            options: $requestOptions,
            convert: MessageMarkReadResponse::class,
        );
    }

    /**
     * @api
     *
     * Send a new message to a specific conversation. The message will be marked
     * as sent by the authenticated customer.
     *
     * @param string $conversation The conversation ID
     * @param array{
     *   content: string, messageType?: string, metadata?: mixed
     * }|MessageSendParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageSendResponse>
     *
     * @throws APIException
     */
    public function send(
        string $conversation,
        array|MessageSendParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessageSendParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['customer/messaging/conversations/%1$s/messages', $conversation],
            body: (object) $parsed,
            options: $options,
            convert: MessageSendResponse::class,
        );
    }
}
