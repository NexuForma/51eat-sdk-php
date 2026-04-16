<?php

declare(strict_types=1);

namespace Eat518\Services\Customer;

use Eat518\Client;
use Eat518\ServiceContracts\Customer\ExploreContract;
use Eat518\Services\Customer\Explore\BusinessesService;

final class ExploreService implements ExploreContract
{
    /**
     * @api
     */
    public ExploreRawService $raw;

    /**
     * @api
     */
    public BusinessesService $businesses;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ExploreRawService($client);
        $this->businesses = new BusinessesService($client);
    }
}
