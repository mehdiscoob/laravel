<?php

namespace App\Services\Client;

use App\Models\Client;
use App\Repositories\Client\ClientRepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientService implements ClientServiceInterface
{
    /**
     * @var ClientRepositoryInterface
     */
    protected $clientRepository;

    /**
     * ClientService constructor.
     *
     * @param ClientRepositoryInterface $clientRepository
     */
    public function __construct(ClientRepositoryInterface $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    /**
     * Get clients as pagination.
     *
     * @param int $perPage
     * @return Paginator
     */
    public function getClientPaginate(int $perPage=20): Paginator
    {
        return $this->clientRepository->getClientPaginate($perPage);
    }

    /**
     * Get a client by their ID.
     *
     * @param int $clientId
     * @return Client|null
     */
    public function getClientById(int $clientId): ?Client
    {
        return $this->clientRepository->findById($clientId);
    }

    /**
     * Get a client by their email address.
     *
     * @param string $email
     * @return Client|null
     */
    public function getClientByEmail(string $email): ?Client
    {
        return $this->clientRepository->findByEmail($email);
    }

    /**
     * Get a client by their mobile number.
     *
     * @param string $mobile
     * @return mixed
     */
    public function getClientByMobile(string $mobile): mixed
    {
        $client=$this->clientRepository->findByMobile($mobile);
        if (!isset($client)){
            return "false";
        }else{
            return $client;
        }
    }

    /**
     * Find a client randomly based on their role.
     *
     * @param string|null $role
     * @return Client|null
     */
    public function findRandomly(?string $role): ?Client
    {
        return $this->clientRepository->findRandomly($role);
    }

    /**
     * Find a client by their ID.
     *
     * @param int $id
     * @return Client|null
     */
    public function findById(int $id): ?Client
    {
        return $this->clientRepository->findById($id);
    }


    /**
     * Update a client's information.
     *
     * @param array $clientData
     * @param int $clientId
     * @return bool
     */
    public function updateClient(array $clientData, int $clientId): bool
    {
        return $this->clientRepository->update($clientData, $clientId);
    }

    /**
     * Create a client's information.
     *
     * @param array $clientData
     * @return Client
     */
    public function createClient(array $clientData): Client
    {
        DB::beginTransaction();
        try {
            $client = $this->clientRepository->create($clientData);
            DB::commit();
            return $client;

        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    /**
     * Register a new Client.
     *
     * @param array $clientData
     * @return Client
     */
    public function register(array $clientData): Client
    {
        return $this->clientRepository->create($clientData)->generate_token();
    }

    /**
     * Delete a client by their ID.
     *
     * @param int $clientId
     * @return bool
     */
    public function deleteClient(int $clientId): bool
    {
        return $this->clientRepository->delete($clientId);
    }
}
