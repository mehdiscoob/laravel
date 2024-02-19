<?php

namespace App\Repositories\Client;

use App\Models\Client;
use Illuminate\Contracts\Pagination\Paginator;

interface ClientRepositoryInterface
{
    /**
     * Get clients as pagination.
     *
     * @param int $perPage
     * @return Paginator
     */
    public function getClientPaginate(int $perPage): Paginator;

    /**
     * Create a new client.
     *
     * @param array $data
     * @return Client
     */
    public function create(array $data): Client;

    /**
     * Find a client by their ID.
     *
     * @param int $clientId
     * @return Client|null
     */
    public function findById(int $clientId): ?Client;

    /**
     * Find a client randomly based on their role.
     *
     * @param string|null $role
     * @return Client|null
     */
    public function findRandomly(?string $role): ?Client;

    /**
     * Find a client by their email address.
     *
     * @param string $email
     * @return Client|null
     */
    public function findByEmail(string $email): ?Client;

    /**
     * Find a client by their mobile number.
     *
     * @param string $mobile
     * @return Client|null
     */
    public function findByMobile(string $mobile): ?Client;

    /**
     * Update a client's information.
     *
     * @param array $data
     * @param int $clientId
     * @return Client|null
     */
    public function update(array $data, int $clientId): ?Client;

    /**
     * Delete a client by their ID.
     *
     * @param int $clientId
     * @return bool
     */
    public function delete(int $clientId): bool;
}
