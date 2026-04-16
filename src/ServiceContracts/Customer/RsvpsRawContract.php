<?php

declare(strict_types=1);

namespace Eat518\ServiceContracts\Customer;

use Eat518\Core\Contracts\BaseResponse;
use Eat518\Core\Exceptions\APIException;
use Eat518\Customer\Rsvps\RsvpListParams;
use Eat518\Customer\Rsvps\RsvpListResponse;
use Eat518\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
interface RsvpsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|RsvpListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RsvpListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|RsvpListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
