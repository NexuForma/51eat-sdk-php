<?php

declare(strict_types=1);

namespace Eat518\ServiceContracts\Customer\Messaging\Conversations;

use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Messaging\Conversations\Messages\MessageGetUnreadCountResponse;
use Eat518\Customer\Messaging\Conversations\Messages\MessageListParams;
use Eat518\Customer\Messaging\Conversations\Messages\MessageListResponse;
use Eat518\Customer\Messaging\Conversations\Messages\MessageMarkReadResponse;
use Eat518\Customer\Messaging\Conversations\Messages\MessageSendParams;
use Eat518\Customer\Messaging\Conversations\Messages\MessageSendResponse;
use Eat518\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
interface MessagesRawContract
{
    /**
     * @api
     *
     * @param string $conversation The conversation ID
     * @param array<string,mixed>|MessageListParams $params
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
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $conversation The conversation ID
     * @param array<string,mixed>|MessageSendParams $params
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
    ): BaseResponse;
}
