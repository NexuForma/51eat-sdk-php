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
use Eat518\RequestOptions;
use Eat518\ServiceContracts\CustomerContract;
use Eat518\Services\Customer\BusinessesService;
use Eat518\Services\Customer\ChannelsService;
use Eat518\Services\Customer\DiscoveryService;
use Eat518\Services\Customer\ExploreService;
use Eat518\Services\Customer\MessagingService;
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
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CustomerRawService($client);
        $this->tokens = new TokensService($client);
        $this->channels = new ChannelsService($client);
        $this->businesses = new BusinessesService($client);
        $this->messaging = new MessagingService($client);
        $this->explore = new ExploreService($client);
        $this->discovery = new DiscoveryService($client);
    }

    /**
     * @api
     *
     * Exchange user credentials for an API token that can be used for subsequent authenticated requests.
     *
     * @param string $deviceName A descriptive name for the device
     * @param string $email The user's email address
     * @param string $password The user's password
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
     * @param string $deviceName A descriptive name for the device
     * @param string $email The customer's email address
     * @param string $name The customer's full name
     * @param string $password The customer's password
     * @param string $passwordConfirmation Password confirmation
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
}
