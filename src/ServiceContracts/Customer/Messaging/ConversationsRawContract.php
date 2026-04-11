<?php

declare(strict_types=1);

namespace Eat518\ServiceContracts\Customer\Messaging;

use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Messaging\Conversations\ConversationDeleteResponse;
use Eat518\Customer\Messaging\Conversations\ConversationGetResponse;
use Eat518\Customer\Messaging\Conversations\ConversationListParams;
use Eat518\Customer\Messaging\Conversations\ConversationListResponse;
use Eat518\Customer\Messaging\Conversations\ConversationStartResponse;
use Eat518\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
interface ConversationsRawContract
{
    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ConversationListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ConversationListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|ConversationListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;
}
