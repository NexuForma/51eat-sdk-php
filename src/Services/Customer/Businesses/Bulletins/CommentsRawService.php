<?php

declare(strict_types=1);

namespace Eat518\Services\Customer\Businesses\Bulletins;

use Eat518\Client;
use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
use Eat518\Core\Util;
use Eat518\Customer\Businesses\Bulletins\Comments\CommentCreateParams;
use Eat518\Customer\Businesses\Bulletins\Comments\CommentListParams;
use Eat518\Customer\Businesses\Bulletins\Comments\CommentListResponse;
use Eat518\Customer\Businesses\Bulletins\Comments\CommentNewResponse;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\Businesses\Bulletins\CommentsRawContract;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class CommentsRawService implements CommentsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Post a comment on a business bulletin. Requires authentication.
     *
     * @param string $bulletin Path param: The bulletin ID
     * @param array{handle: string, body: string}|CommentCreateParams $params
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
    ): BaseResponse {
        [$parsed, $options] = CommentCreateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $handle = $parsed['handle'];
        unset($parsed['handle']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'customer/businesses/%1$s/bulletins/%2$s/comments', $handle, $bulletin,
            ],
            body: (object) array_diff_key($parsed, array_flip(['handle'])),
            options: $options,
            convert: CommentNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve paginated comments for a published business bulletin.
     *
     * @param string $bulletin Path param: The bulletin ID
     * @param array{
     *   handle: string, page?: int, perPage?: int
     * }|CommentListParams $params
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
    ): BaseResponse {
        [$parsed, $options] = CommentListParams::parseRequest(
            $params,
            $requestOptions,
        );
        $handle = $parsed['handle'];
        unset($parsed['handle']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'customer/businesses/%1$s/bulletins/%2$s/comments', $handle, $bulletin,
            ],
            query: Util::array_transform_keys($parsed, ['perPage' => 'per_page']),
            options: $options,
            convert: CommentListResponse::class,
        );
    }
}
