<?php

declare(strict_types=1);

namespace Eat518\ServiceContracts\Customer\Messaging\Conversations;

use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Messaging\Conversations\Messages\MessageGetUnreadCountResponse;
use Eat518\Customer\Messaging\Conversations\Messages\MessageListResponse;
use Eat518\Customer\Messaging\Conversations\Messages\MessageMarkReadResponse;
use Eat518\Customer\Messaging\Conversations\Messages\MessageSendResponse;
use Eat518\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
interface MessagesContract
{
    /**
     * @api
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
    ): MessageListResponse;

    /**
     * @api
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
    ): int;

    /**
     * @api
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
    ): int;

    /**
     * @api
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
    ): MessageSendResponse;
}
