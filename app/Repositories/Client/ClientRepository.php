<?php

namespace App\Repositories\Client;

use App\Models\Client;
use Illuminate\Contracts\Pagination\Paginator;

class ClientRepository implements ClientRepositoryInterface
{
    /**
     * Get clients as pagination.
     *
     * @param int $perPage
     * @return Paginator
     */
    public function getClientPaginate(int $perPage): Paginator
    {
        return Client::query()->paginate($perPage);
    }

    /**
     * Create a new client.
     *
     * @param array $data
     * @return Client
     */
    public function create(array $data): Client
    {
        return Client::create($data);
    }

    /**
     * Find a client by their ID.
     *
     * @param int $clientId
     * @return Client|null
     */
    public function findById(int $clientId): ?Client
    {
        return Client::find($clientId);
    }

    /**
     * Find a client randomly based on their role.
     *
     * @param string|null $role
     * @return Client|null
     */
    public function findRandomly(?string $role): ?Client
    {
        return Client::where('role', $role ?? "customer")->inRandomOrder()->first();
    }

    /**
     * Find a client by their email address.
     *
     * @param string $email
     * @return Client|null
     */
    public function findByEmail(string $email): ?Client
    {
        return Client::where('email', $email)->first();
    }

    /**
     * Find a client by their mobile number.
     *
     * @param string $mobile
     * @return Client|null
     */
    public function findByMobile(string $mobile): ?Client
    {
        return Client::where('mobile', $mobile)->first();
    }

    /**
     * Update a client's information.
     *
     * @param array $data
     * @param int $clientId
     * @return Client|null
     */
    public function update(array $data, int $clientId): ?Client
    {
        $client = $this->findById($clientId);

        if ($client) {
            $client->update($data);
            return $client;
        }

        return null;
    }

    /**
     * Delete a client by their ID.
     *
     * @param int $clientId
     * @return bool
     */
    public function delete(int $clientId): bool
    {
        $client = $this->findById($clientId);

        if ($client) {
            $client->delete();
            return true;
        }

        return false;
    }
}
