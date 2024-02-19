<?php

namespace App\Services\Tenant;

use App\Models\Tenant;
use App\Repositories\Tenant\TenantRepositoryInterface;

class TenantService implements TenantServiceInterface
{
    /**
     * @var TenantRepositoryInterface
     */
    protected $tenantRepository;

    /**
     * TenantService constructor.
     *
     * @param TenantRepositoryInterface $tenantRepository
     */
    public function __construct(TenantRepositoryInterface $tenantRepository)
    {
        $this->tenantRepository = $tenantRepository;
    }

    /**
     * Get all tenants.
     *
     * @return \Illuminate\Database\Eloquent\Collection|Tenant[]
     */
    public function getAllTenants()
    {
        return $this->tenantRepository->getAllTenants();
    }

    /**
     * Get a tenant by Client.
     *
     * @param int $clientId
     * @return Tenant
     */
    public function getTenantByClient(int $clientId): Tenant
    {
        return $this->tenantRepository->getTenantByClient($clientId);
    }

    /**
     * Get a tenant by ID.
     *
     * @param int $tenantId
     * @return Tenant
     */
    public function getTenantById(int $tenantId): Tenant
    {
        return $this->tenantRepository->getTenantById($tenantId);
    }
}
