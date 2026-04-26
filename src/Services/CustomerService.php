<?php

declare(strict_types=1);

namespace Eat518\Services;

use Eat518\Client;
use Eat518\Core\Exceptions\APIException;
use Eat518\Core\Util;
use Eat518\Customer\CustomerGetUserResponse;
use Eat518\Customer\CustomerLoginResponse;
use Eat518\Customer\CustomerLogoutAllResponse;
use Eat518\Customer\CustomerLogoutResponse;
use Eat518\Customer\CustomerRegisterResponse;
use Eat518\Customer\CustomerSearchResponse;
use Eat518\RequestOptions;
use Eat518\ServiceContracts\CustomerContract;
use Eat518\Services\Customer\BusinessesService;
use Eat518\Services\Customer\ChannelsService;
use Eat518\Services\Customer\DiscoveryService;
use Eat518\Services\Customer\EventsService;
use Eat518\Services\Customer\ExploreService;
use Eat518\Services\Customer\FavoritesService;
use Eat518\Services\Customer\MessagingService;
use Eat518\Services\Customer\RsvpsService;
use Eat518\Services\Customer\TicketOrdersService;
use Eat518\Services\Customer\TicketsService;
use Eat518\Services\Customer\TokensService;

/**
 * @phpstan-import-type RequestOpts from \Eat518\RequestOptions
 */
final class CustomerService implements CustomerContract
{
    /**
     * @api
     */
    public CustomerRawService $raw;

    /**
     * @api
     */
    public TokensService $tokens;

    /**
     * @api
     */
    public ChannelsService $channels;

    /**
     * @api
     */
    public FavoritesService $favorites;

    /**
     * @api
     */
    public RsvpsService $rsvps;

    /**
     * @api
     */
    public BusinessesService $businesses;

    /**
     * @api
     */
    public MessagingService $messaging;

    /**
     * @api
     */
    public ExploreService $explore;

    /**
     * @api
     */
    public DiscoveryService $discovery;

    /**
     * @api
     */
    public TicketsService $tickets;

    /**
     * @api
     */
    public TicketOrdersService $ticketOrders;

    /**
     * @api
     */
    public EventsService $events;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CustomerRawService($client);
        $this->tokens = new TokensService($client);
        $this->channels = new ChannelsService($client);
        $this->favorites = new FavoritesService($client);
        $this->rsvps = new RsvpsService($client);
        $this->businesses = new BusinessesService($client);
        $this->messaging = new MessagingService($client);
        $this->explore = new ExploreService($client);
        $this->discovery = new DiscoveryService($client);
        $this->tickets = new TicketsService($client);
        $this->ticketOrders = new TicketOrdersService($client);
        $this->events = new EventsService($client);
    }

    /**
     * @api
     *
     * Exchange user credentials for an API token that can be used for subsequent authenticated requests.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function login(
        string $deviceName,
        string $email,
        string $password,
        RequestOptions|array|null $requestOptions = null,
    ): CustomerLoginResponse {
        $params = Util::removeNulls(
            ['deviceName' => $deviceName, 'email' => $email, 'password' => $password]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->login(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Revoke the current API token and log out the user.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function logout(
        RequestOptions|array|null $requestOptions = null
    ): CustomerLogoutResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->logout(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Revoke all API tokens for the authenticated user.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function logoutAll(
        RequestOptions|array|null $requestOptions = null
    ): CustomerLogoutAllResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->logoutAll(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create a new customer account and return an API token for immediate authentication.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function register(
        string $deviceName,
        string $email,
        string $name,
        string $password,
        string $passwordConfirmation,
        RequestOptions|array|null $requestOptions = null,
    ): CustomerRegisterResponse {
        $params = Util::removeNulls(
            [
                'deviceName' => $deviceName,
                'email' => $email,
                'name' => $name,
                'password' => $password,
                'passwordConfirmation' => $passwordConfirmation,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->register(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the current authenticated user's profile information.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveUser(
        RequestOptions|array|null $requestOptions = null
    ): CustomerGetUserResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveUser(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns grouped results for each type. Use per_type to control how many results
     * appear per section. Optionally filter by category, city, or geo radius.
     *
     * @param string $q Search query
     * @param string $category Filter by business category
     * @param string $city Filter by city
     * @param mixed $lat Latitude for geo radius filter (requires lng and radius_km)
     * @param mixed $lng Longitude for geo radius filter (requires lat and radius_km)
     * @param int $perType Max results per type (default 5, max 20)
     * @param int $radiusKm Geo radius in kilometers (requires lat and lng)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function search(
        string $q,
        ?string $category = null,
        ?string $city = null,
        mixed $lat = null,
        mixed $lng = null,
        ?int $perType = null,
        ?int $radiusKm = null,
        RequestOptions|array|null $requestOptions = null,
    ): CustomerSearchResponse {
        $params = Util::removeNulls(
            [
                'q' => $q,
                'category' => $category,
                'city' => $city,
                'lat' => $lat,
                'lng' => $lng,
                'perType' => $perType,
                'radiusKm' => $radiusKm,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->search(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
