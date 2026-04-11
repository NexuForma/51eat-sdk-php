<?php

declare(strict_types=1);

namespace Eat518\ServiceContracts\Customer\Messaging;

use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Messaging\Conversations\ConversationDeleteResponse;
use Eat518\Customer\Messaging\Conversations\ConversationGetResponse;
use Eat518\Customer\Messaging\Conversations\ConversationListResponse;
use Eat518\Customer\Messaging\Conversations\ConversationStartResponse;
use Eat518\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
interface ConversationsContract
{
    /**
     * @api
     *
     * @param string $conversation The conversation ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $conversation,
        RequestOptions|array|null $requestOptions = null
    ): ConversationGetResponse;

    /**
     * @api
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
    ): ConversationListResponse;

    /**
     * @api
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
    ): int;

    /**
     * @api
     *
     * @param string $business The business handle or ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function start(
        string $business,
        RequestOptions|array|null $requestOptions = null
    ): ConversationStartResponse;
}
