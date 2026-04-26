<?php

declare(strict_types=1);

namespace Eat518\Services\Customer\Businesses;

use Eat518\Client;
use Eat518\Core\Exceptions\APIException;
use Eat518\Core\Util;
use Eat518\Customer\Businesses\Bulletins\BulletinListResponse;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\Customer\Businesses\BulletinsContract;
use Eat518\Services\Customer\Businesses\Bulletins\CommentsService;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class BulletinsService implements BulletinsContract
{
    /**
     * @api
     */
    public BulletinsRawService $raw;

    /**
     * @api
     */
    public CommentsService $comments;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BulletinsRawService($client);
        $this->comments = new CommentsService($client);
    }

    /**
     * @api
     *
     * Retrieve business announcements and updates with pagination.
     *
     * @param string $handle The business handle
     * @param int $page Page number for pagination
     * @param int $perPage Number of bulletins per page
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $handle,
        ?int $page = null,
        ?int $perPage = null,
        RequestOptions|array|null $requestOptions = null,
    ): BulletinListResponse {
        $params = Util::removeNulls(['page' => $page, 'perPage' => $perPage]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($handle, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
