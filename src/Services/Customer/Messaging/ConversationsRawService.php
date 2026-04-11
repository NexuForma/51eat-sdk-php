<?php

declare(strict_types=1);

namespace Eat518\Services\Customer\Messaging;

use Eat518\Client;
use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
use Eat518\Core\Util;
use Eat518\Customer\Messaging\Conversations\ConversationDeleteResponse;
use Eat518\Customer\Messaging\Conversations\ConversationGetResponse;
use Eat518\Customer\Messaging\Conversations\ConversationListParams;
use Eat518\Customer\Messaging\Conversations\ConversationListResponse;
use Eat518\Customer\Messaging\Conversations\ConversationStartResponse;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\Messaging\ConversationsRawContract;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class ConversationsRawService implements ConversationsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve details of a specific conversation including the business information
     * and the latest message.
     *
     * @param string $conversation The conversation ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ConversationGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $conversation,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['customer/messaging/conversations/%1$s', $conversation],
            options: $requestOptions,
            convert: ConversationGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a paginated list of all conversations for the authenticated customer,
     * ordered by the most recent message first.
     *
     * @param array{page?: int, perPage?: int}|ConversationListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ConversationListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|ConversationListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ConversationListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'customer/messaging/conversations',
            query: Util::array_transform_keys($parsed, ['perPage' => 'per_page']),
            options: $options,
            convert: ConversationListResponse::class,
        );
    }

    /**
     * @api
     *
     * Permanently delete a conversation and all its messages.
     * This action cannot be undone.
     *
     * @param string $conversation The conversation ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<value-of<ConversationDeleteResponse>>
     *
     * @throws APIException
     */
    public function delete(
        string $conversation,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['customer/messaging/conversations/%1$s', $conversation],
            options: $requestOptions,
            convert: ConversationDeleteResponse::class,
        );
    }

    /**
     * @api
     *
     * Create a new conversation between the authenticated customer and the specified business.
     * If a conversation already exists, it will be returned instead of creating a duplicate.
     *
     * @param string $business The business handle or ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ConversationStartResponse>
     *
     * @throws APIException
     */
    public function start(
        string $business,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['customer/messaging/conversations/%1$s', $business],
            options: $requestOptions,
            convert: ConversationStartResponse::class,
        );
    }
}
