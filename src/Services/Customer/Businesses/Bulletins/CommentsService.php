<?php

declare(strict_types=1);

namespace Eat518\Services\Customer\Businesses\Bulletins;

use Eat518\Client;
use Eat518\Core\Exceptions\APIException;
use Eat518\Core\Util;
use Eat518\Customer\Businesses\Bulletins\Comments\CommentListResponse;
use Eat518\Customer\Businesses\Bulletins\Comments\CommentNewResponse;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\Businesses\Bulletins\CommentsContract;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class CommentsService implements CommentsContract
{
    /**
     * @api
     */
    public CommentsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CommentsRawService($client);
    }

    /**
     * @api
     *
     * Post a comment on a business bulletin. Requires authentication.
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
    ): CommentNewResponse {
        $params = Util::removeNulls(['handle' => $handle, 'body' => $body]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($bulletin, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve paginated comments for a published business bulletin.
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
    ): CommentListResponse {
        $params = Util::removeNulls(
            ['handle' => $handle, 'page' => $page, 'perPage' => $perPage]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($bulletin, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
