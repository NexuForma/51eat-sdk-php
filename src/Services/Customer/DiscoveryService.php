<?php

declare(strict_types=1);

namespace Eat518\Services\Customer;

use Eat518\Client;
use Eat518\ServiceContracts\Customer\DiscoveryContract;
use Eat518\Services\Customer\Discovery\CategoriesService;

final class DiscoveryService implements DiscoveryContract
{
    /**
     * @api
     */
    public DiscoveryRawService $raw;

    /**
     * @api
     */
    public CategoriesService $categories;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new DiscoveryRawService($client);
        $this->categories = new CategoriesService($client);
    }
}
