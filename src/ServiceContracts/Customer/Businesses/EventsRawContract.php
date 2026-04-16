<?php

declare(strict_types=1);

namespace Eat518\ServiceContracts\Customer\Businesses;

use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Businesses\Events\EventGetResponse;
use Eat518\Customer\Businesses\Events\EventListParams;
use Eat518\Customer\Businesses\Events\EventListResponse;
use Eat518\Customer\Businesses\Events\EventRetrieveParams;
use Eat518\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
interface EventsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|EventRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EventGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $eventID,
        array|EventRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $handle The business handle
     * @param array<string,mixed>|EventListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EventListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $handle,
        array|EventListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
