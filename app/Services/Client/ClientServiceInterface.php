<?php

namespace App\Services\Client;

use App\Models\Client;

interface ClientServiceInterface
{
    /**
     * Get a client by their ID.
     *
     * @param int $clientId
     * @return Client|null
     */
    public function getClientById(int $clientId): ?Client;

    /**
     * Get a client by their email address.
     *
     * @param string $email
     * @return Client|null
     */
    public function getClientByEmail(string $email): ?Client;

    /**
     * Get a client by their mobile number.
     *
     * @param string $mobile
     * @return mixed
     */
    public function getClientByMobile(string $mobile): mixed;

    /**
     * Find a client randomly based on their role.
     *
     * @param string|null $role
     * @return Client|null
     */
    public function findRandomly(?string $role): ?Client;

    /**
     * Find a client by their ID.
     *
     * @param int $id
     * @return Client|null
     */
    public function findById(int $id): ?Client;

    /**
     * Update a client's information.
     *
     * @param array $clientData
     * @param int $clientId
     * @return bool
     */
    public function updateClient(array $clientData, int $clientId): bool;

    /**
     * Create a client's information.
     *
     * @param array $clientData
     * @return Client
     */
    public function createClient(array $clientData): Client;

    /**
     * Register a new Client.
     *
     * @param array $clientData
     * @return Client
     */
    public function register(array $clientData): Client;

    /**
     * Delete a client by their ID.
     *
     * @param int $clientId
     * @return bool
     */
    public function deleteClient(int $clientId): bool;
}
