<?php

declare(strict_types=1);

namespace Eat518\Services\Customer\Messaging;

use Eat518\Client;
use Eat518\Core\Exceptions\APIException;
use Eat518\Core\Util;
use Eat518\Customer\Messaging\Conversations\ConversationDeleteResponse;
use Eat518\Customer\Messaging\Conversations\ConversationGetResponse;
use Eat518\Customer\Messaging\Conversations\ConversationListResponse;
use Eat518\Customer\Messaging\Conversations\ConversationStartResponse;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\Messaging\ConversationsContract;
use Eat518\Services\Customer\Messaging\Conversations\MessagesService;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class ConversationsService implements ConversationsContract
{
    /**
     * @api
     */
    public ConversationsRawService $raw;

    /**
     * @api
     */
    public MessagesService $messages;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ConversationsRawService($client);
        $this->messages = new MessagesService($client);
    }

    /**
     * @api
     *
     * Retrieve details of a specific conversation including the business information
     * and the latest message.
     *
     * @param string $conversation The conversation ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $conversation,
        RequestOptions|array|null $requestOptions = null
    ): ConversationGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($conversation, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a paginated list of all conversations for the authenticated customer,
     * ordered by the most recent message first.
     *
     * @param int $page Page number for pagination
     * @param int $perPage Number of conversations per page
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        ?int $page = null,
        ?int $perPage = null,
        RequestOptions|array|null $requestOptions = null,
    ): ConversationListResponse {
        $params = Util::removeNulls(['page' => $page, 'perPage' => $perPage]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
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
     * @return value-of<ConversationDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $conversation,
        RequestOptions|array|null $requestOptions = null
    ): int {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($conversation, requestOptions: $requestOptions);

        return $response->parse();
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
     * @throws APIException
     */
    public function start(
        string $business,
        RequestOptions|array|null $requestOptions = null
    ): ConversationStartResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->start($business, requestOptions: $requestOptions);

        return $response->parse();
    }
}
