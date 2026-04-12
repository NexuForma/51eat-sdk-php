<?php

declare(strict_types=1);

namespace Eat518\ServiceContracts\Customer\Businesses\Bulletins;

use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Businesses\Bulletins\Comments\CommentCreateParams;
use Eat518\Customer\Businesses\Bulletins\Comments\CommentListParams;
use Eat518\Customer\Businesses\Bulletins\Comments\CommentListResponse;
use Eat518\Customer\Businesses\Bulletins\Comments\CommentNewResponse;
use Eat518\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
interface CommentsRawContract
{
    /**
     * @api
     *
     * @param string $bulletin Path param: The bulletin ID
     * @param array<string,mixed>|CommentCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CommentNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $bulletin,
        array|CommentCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $bulletin Path param: The bulletin ID
     * @param array<string,mixed>|CommentListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CommentListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $bulletin,
        array|CommentListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
