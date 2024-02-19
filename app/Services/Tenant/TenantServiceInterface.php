<?php

namespace App\Services\Tenant;

use App\Models\Tenant;

interface TenantServiceInterface
{
    /**
     * Get all tenants.
     *
     * @return Tenant
     */
    public function getAllTenants();

    /**
     * Get a tenant by Client.
     *
     * @param int $clientId
     * @return Tenant
     */
    public function getTenantByClient(int $clientId): Tenant;

    /**
     * Get a tenant by ID.
     *
     * @param int $tenantId
     * @return Tenant
     */
    public function getTenantById(int $tenantId): Tenant;
}
