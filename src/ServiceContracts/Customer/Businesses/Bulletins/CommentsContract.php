<?php

declare(strict_types=1);

namespace Eat518\ServiceContracts\Customer\Businesses\Bulletins;

use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Businesses\Bulletins\Comments\CommentListResponse;
use Eat518\Customer\Businesses\Bulletins\Comments\CommentNewResponse;
use Eat518\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
interface CommentsContract
{
    /**
     * @api
     *
     * @param string $bulletin Path param: The bulletin ID
     * @param string $handle Path param: The business handle
     * @param string $body Body param: The comment text
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $bulletin,
        string $handle,
        string $body,
        RequestOptions|array|null $requestOptions = null,
    ): CommentNewResponse;

    /**
     * @api
     *
     * @param string $bulletin Path param: The bulletin ID
     * @param string $handle Path param: The business handle
     * @param int $page Query param: Page number for pagination
     * @param int $perPage Query param: Number of comments per page
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $bulletin,
        string $handle,
        ?int $page = null,
        ?int $perPage = null,
        RequestOptions|array|null $requestOptions = null,
    ): CommentListResponse;
}
